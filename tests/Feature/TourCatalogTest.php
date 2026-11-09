<?php

namespace Tests\Feature;

use App\Filament\Resources\Tours\Pages\CreateTour;
use App\Filament\Resources\Tours\Pages\EditTour;
use App\Models\Tour;
use App\Models\User;
use Database\Seeders\TourSeeder;
use Filament\Facades\Filament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class TourCatalogTest extends TestCase
{
    use RefreshDatabase;

    private function tourData(array $overrides = []): array
    {
        return array_replace([
            'title' => 'Тестовый тур', 'description' => 'Описание путешествия',
            'country' => 'Россия', 'category' => 'Поход', 'duration_days' => 3,
            'price' => '120.50', 'rating' => '4.8', 'is_active' => true,
        ], $overrides);
    }

    private function loginToPanel(): void
    {
        // Filament permits authenticated users in the local development environment.
        config(['app.env' => 'local']);
        Filament::setCurrentPanel(Filament::getPanel('admin'));
        $this->actingAs(User::factory()->create());
    }

    public function test_catalog_shows_only_published_tours_and_escapes_content(): void
    {
        Tour::create($this->tourData(['title' => '<script>alert(1)</script>']));
        Tour::create($this->tourData(['title' => 'Скрытый тур', 'is_active' => false]));

        $this->get('/tours')->assertOk()
            ->assertSee('&lt;script&gt;alert(1)&lt;/script&gt;', false)
            ->assertDontSee('<script>alert(1)</script>', false)
            ->assertSee('$120.50', false)->assertDontSee('Скрытый тур');
    }

    public function test_empty_catalog_and_guest_admin_access(): void
    {
        $this->get('/tours')->assertOk()->assertSee('Сейчас нет опубликованных туров');
        $this->get('/admin/tours')->assertRedirect('/admin/login');
    }

    public function test_each_published_card_opens_its_own_details(): void
    {
        $first = Tour::create($this->tourData([
            'title' => 'Озёрный тур', 'details' => 'Прогулка по берегу', 'program' => 'День у воды',
            'itinerary' => [['title' => 'Берег озера', 'description' => 'Прогулка у воды']],
            'hotels' => [['id' => 'lake', 'name' => 'Озёрный отель', 'description' => 'У берега', 'amenities' => 'Wi-Fi', 'image' => 'images/tour-alpine.png', 'extra_per_day' => 0]],
        ]));
        $second = Tour::create($this->tourData([
            'title' => 'Горный тур', 'details' => 'Подъём на вершину', 'program' => 'День в горах', 'price' => 400, 'duration_days' => 5,
            'itinerary' => [['title' => 'Тропа', 'description' => 'Подъём в горы']],
            'hotels' => [
                ['id' => 'mountain', 'name' => 'Горный дом', 'description' => 'У тропы', 'amenities' => 'Wi-Fi', 'image' => 'images/tour-alpine.png', 'extra_per_day' => 0],
                ['id' => 'comfort', 'name' => 'Горный комфорт', 'description' => 'Вид на горы', 'amenities' => 'Завтрак', 'image' => 'images/tour-alpine.png', 'extra_per_day' => 35],
            ],
        ]));
        $hidden = Tour::create($this->tourData(['title' => 'Скрытый тур', 'is_active' => false]));

        foreach (['/', '/tours'] as $url) {
            $this->get($url)->assertOk()
                ->assertSee(route('tours.show', $first), false)
                ->assertSee(route('tours.show', $second), false)
                ->assertDontSee('Скрытый тур');
        }

        $this->get(route('tours.show', $first))->assertOk()
            ->assertSee('Прогулка по берегу')->assertSee('Берег озера')->assertSee('Прогулка у воды')
            ->assertSee('class="tour-detail__days"', false)->assertSee('Этап 1')
            ->assertSee('Настройте поездку')->assertSee('Выберите отель')
            ->assertSee('name="hotel" value="lake"', false)->assertSee('Озёрный отель')
            ->assertDontSee('Горный комфорт')
            ->assertSee('data-hotel-prev', false)->assertSee('data-hotel-next', false)
            ->assertSee('name="adults"', false)->assertSee('name="start"', false)
            ->assertDontSee('Подъём на вершину');
        $this->get(route('tours.show', $second))->assertOk()
            ->assertSee('Подъём на вершину')->assertSee('Подъём в горы')
            ->assertSee('Горный комфорт')->assertDontSee('Озёрный отель')
            ->assertSee('Настройте поездку')->assertSee('value="'.$second->id.'"', false)
            ->assertSee('data-base-price="400.00"', false)->assertSee('data-duration="5"', false)
            ->assertDontSee('Прогулка по берегу');
        $this->get('/cart?'.http_build_query([
            'tour' => $second->id, 'adults' => 2, 'under5' => 1,
            'children' => 0, 'hotel' => 'comfort', 'start' => '2027-06-01',
        ]))->assertOk()->assertSee('Горный тур')->assertDontSee('Озёрный тур')
            ->assertSee('$1,425.00')->assertSee('Горный комфорт')
            ->assertSee('type="button" disabled>Подтвердить заказ', false);
        $this->get('/cart?tour='.$second->id.'&hotel=lake')->assertSessionHasErrors('hotel');
        $this->get('/cart?tour='.$hidden->id)->assertNotFound();
        $this->get('/cart?tour='.$second->id.'&hotel=invalid')->assertSessionHasErrors('hotel');
        $this->get(route('tours.show', $hidden))->assertNotFound();
        $this->get('/tours/999999')->assertNotFound();
    }

    public function test_admin_can_create_edit_unpublish_and_delete_tour(): void
    {
        $this->loginToPanel();
        Livewire::test(CreateTour::class)->fillForm($this->tourData())->call('create')->assertHasNoFormErrors();
        $tour = Tour::firstOrFail();
        $this->get('/tours')->assertSee('Тестовый тур');

        Livewire::test(EditTour::class, ['record' => $tour->getRouteKey()])
            ->fillForm(['title' => 'Изменённый тур', 'is_active' => false])
            ->call('save')->assertHasNoFormErrors();
        $this->assertDatabaseHas('tours', ['id' => $tour->id, 'title' => 'Изменённый тур', 'is_active' => false]);
        $this->get('/tours')->assertDontSee('Изменённый тур');

        Livewire::test(EditTour::class, ['record' => $tour->getRouteKey()])->callAction('delete');
        $this->assertDatabaseMissing('tours', ['id' => $tour->id]);
    }

    public function test_admin_list_renders_tours_and_formatted_prices(): void
    {
        $this->loginToPanel();
        Tour::create($this->tourData());

        $this->get('/admin/tours')->assertOk()
            ->assertSee('Тестовый тур')->assertSee('120.50');
    }

    public function test_admin_rejects_invalid_numeric_values(): void
    {
        $this->loginToPanel();
        Livewire::test(CreateTour::class)
            ->fillForm($this->tourData(['price' => -1, 'duration_days' => 0, 'rating' => 6]))
            ->call('create')->assertHasFormErrors(['price', 'duration_days', 'rating']);
        $this->assertDatabaseCount('tours', 0);
    }

    public function test_seed_preserves_existing_edits_and_copies_images(): void
    {
        Storage::fake('public');
        $this->seed(TourSeeder::class);
        $tour = Tour::firstOrFail();
        $customHotels = [['id' => 'custom', 'name' => 'Авторский отель', 'extra_per_day' => 0]];
        $tour->update(['price' => 42, 'program' => 'Авторская программа', 'hotels' => $customHotels]);
        $this->seed(TourSeeder::class);
        $this->assertDatabaseCount('tours', 6);
        $this->assertEquals('42.00', $tour->fresh()->price);
        $this->assertNotEmpty($tour->fresh()->details);
        $this->assertSame($customHotels, $tour->fresh()->hotels);
        $this->assertCount(5, $tour->fresh()->itinerary);
        $this->assertSame('Авторская программа', $tour->fresh()->program);
        Storage::disk('public')->assertExists($tour->image);
        $this->assertNotSame(
            Tour::where('country', 'Switzerland')->firstOrFail()->hotels[0]['name'],
            Tour::where('country', 'Norway')->firstOrFail()->hotels[0]['name'],
        );
    }
}

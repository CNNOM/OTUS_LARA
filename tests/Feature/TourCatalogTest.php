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
        $tour->update(['price' => 42]);
        $this->seed(TourSeeder::class);
        $this->assertDatabaseCount('tours', 6);
        $this->assertEquals('42.00', $tour->fresh()->price);
        Storage::disk('public')->assertExists($tour->image);
    }
}

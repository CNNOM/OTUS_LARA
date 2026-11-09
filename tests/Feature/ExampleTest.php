<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_pages_with_frontend_layout_are_available(): void
    {
        foreach (['/' => 'Открой красоту природы', '/registration' => 'Регистрация поездки', '/cart' => 'Корзина и оформление'] as $url => $heading) {
            $this->get($url)->assertOk()->assertSee($heading)->assertSee('href="/cart"', false);
        }

        $this->get('/registration')->assertSee('type="button" disabled>Отправить заявку', false);
        $this->get('/cart')->assertSee('Корзина пуста');

        foreach (['/about' => 'Всё начинается с желания увидеть больше', '/contacts' => 'Обсудим ваше путешествие', '/faq' => 'Частые вопросы'] as $url => $heading) {
            $this->get($url)->assertOk()->assertSee($heading)->assertSee('href="/tours"', false);
        }

        $this->get('/cart')->assertOk()->assertSee('Смотреть туры');

        foreach (['/products', '/contact', '/auth'] as $url) {
            $this->get($url)->assertNotFound();
        }
    }
}

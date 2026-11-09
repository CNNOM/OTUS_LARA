<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_pages_with_frontend_layout_are_available(): void
    {
        foreach (['/' => 'Открой красоту природы', '/registration' => 'Регистрация поездки', '/cart' => 'Корзина и оформление'] as $url => $heading) {
            $this->get($url)->assertOk()->assertSee($heading)->assertSee('href="/cart"', false);
        }

        $this->get('/registration')->assertSee('type="button" disabled>Отправить заявку', false);
        $this->get('/cart')->assertSee('type="button" disabled>Подтвердить заказ', false);

        foreach (['/about', '/faq', '/products', '/contact', '/auth'] as $url) {
            $this->get($url)->assertNotFound();
        }
    }
}

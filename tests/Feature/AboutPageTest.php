<?php

namespace Tests\Feature;

use Tests\TestCase;

class AboutPageTest extends TestCase
{
    public function test_about_page_is_served_by_about_controller(): void
    {
        config([
            'contacts.phone' => '+1 555 010 0200',
            'contacts.email' => 'hello@example.test',
            'contacts.address' => '10 Example Street',
        ]);

        $this->get('/about')
            ->assertOk()
            ->assertSee('href="tel:+15550100200"', false)
            ->assertSee('+1 555 010 0200')
            ->assertSee('mailto:hello@example.test', false)
            ->assertSee('hello@example.test')
            ->assertSee('10 Example Street');
    }

    public function test_phone_link_is_normalized_without_changing_displayed_number(): void
    {
        config(['contacts.phone' => '+1 (555) 010-0200']);

        $this->get('/about')
            ->assertOk()
            ->assertSee('href="tel:+15550100200">+1 (555) 010-0200</a>', false);
    }
}

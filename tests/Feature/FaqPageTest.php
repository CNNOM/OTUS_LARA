<?php

namespace Tests\Feature;

use Tests\TestCase;

class FaqPageTest extends TestCase
{
    public function test_faq_page_is_served_with_heading(): void
    {
        $this->get('/faq')
            ->assertOk()
            ->assertSee('Часто задаваемые вопросы');
    }
}

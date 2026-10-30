<?php

namespace Tests\Feature;

use Tests\TestCase;

class FaqPageTest extends TestCase
{
    public function test_faq_page_is_served_with_its_heading(): void
    {
        $this->get('/faq')
            ->assertOk()
            ->assertSee('<h1>Часто задаваемые вопросы</h1>', false);
    }
}

<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_homepage_is_the_kat_mapping_coming_soon_page(): void
    {
        $response = $this->get('/');

        $response
            ->assertOk()
            ->assertSee('KAT MAPPING')
            ->assertSee('FILESERVICE — COMING SOON')
            ->assertSee('https://wa.me/4915566180004', false)
            ->assertDontSee('KK-BOOST')
            ->assertDontSee('kk-boostfileservice.de')
            ->assertDontSee('<form', false);
    }

    public function test_old_contact_form_routes_are_disabled(): void
    {
        $this->get('/contact')->assertNotFound();
        $this->post('/contact')->assertNotFound();
    }
}

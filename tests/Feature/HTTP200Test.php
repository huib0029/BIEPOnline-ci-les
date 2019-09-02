<?php

namespace Tests\Feature;

use Tests\TestCase;

class HTTP200Test extends TestCase
{
    /** @test */
    public function login_page_is_available()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}

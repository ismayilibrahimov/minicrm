<?php

namespace Tests\Unit;

use Tests\TestCase;

class HttpTest extends TestCase
{
    public function test_index_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_home_page()
    {
        $response = $this->get('/home');

        $response->assertStatus(302);
    }

    public function test_companies_page()
    {
        $response = $this->get('/companies');

        $response->assertStatus(302);
    }

    public function test_employees_page()
    {
        $response = $this->get('/employees');

        $response->assertStatus(302);
    }

    public function test_login_page()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }


    public function test_register_disabled()
    {
        $response = $this->get('/register');

        $response->assertStatus(404);
    }
}

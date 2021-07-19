<?php

namespace Tests\Unit;

use Tests\TestCase;

class DataTest extends TestCase
{
    public function test_admin_email()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'admin@admin.com',
        ]);
    }

    public function test_users_count()
    {
        $this->assertDatabaseCount('users', 1);
    }
}

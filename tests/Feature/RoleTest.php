<?php

namespace Tests\Feature;

use App\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    function it_has_an_id()
    {
        $unit = factory(\App\Role::class)->create();
        $this->assertGreaterThan(0, $unit->id);
    }
    /** @test */
    function it_has_a_name()
    {
        $unit = factory(\App\Role::class)->create(['name' => 'Testrol']);
        $this->assertEquals('Testrol', $unit->name);
    }

}

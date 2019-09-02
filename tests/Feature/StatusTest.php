<?php

namespace Tests\Feature;

use App\Status;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatusTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    function test_it_has_an_id()
    {
        $unit = factory(\App\Status::class)->create();
        $this->assertGreaterThan(0, $unit->id);
    }

    /** @test */
    function test_it_has_a_name()
    {
        $status = factory(\App\Status::class)->create(['status' => 'statusnaam']);
        $this->assertEquals('statusnaam', $status->status);
    }

    /** @test */
    function Test_it_requires_a_name()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $status = factory(\App\Status::class)->create(['status' => null]);
    }
}


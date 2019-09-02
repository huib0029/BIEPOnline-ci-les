<?php

namespace Tests\Feature;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
  /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */

    public function testit_has_an_id()
    {
        $unit = factory(\App\Author::class)->create();
        $this->assertGreaterThan(0, $unit->id);
    }

}

<?php

namespace Tests\Feature;

use App\Author;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthorTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    function testit_has_an_id()
    {
        $unit = factory(\App\Author::class)->create();
        $this->assertGreaterThan(0, $unit->id);
    }

    function test_a_name_is_required()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $author = factory(\App\Author::class)->create(['authorname' => null]);
    }

    function test_it_has_a_name()
    {
        $author = factory(\App\Author::class)->create(['name' => 'authorname']);
        $this->assertEquals('authorname', $author->name);
    }

}

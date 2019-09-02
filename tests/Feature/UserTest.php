<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    function it_has_a_name()
    {
        $user = factory(\App\User::class)->create(['name' => 'Username', 'role_id' => 1]);
        $this->assertEquals('Username', $user->name);
    }

    /** @test */
    function it_has_an_email()
    {
        $user = factory(\App\User::class)->create(['email' => 'emailadres']);
        $this->assertEquals('emailadres', $user->email);
    }

    /** @test */
    function it_has_a_password()
    {
        $user = factory(\App\User::class)->create(['password' => 'password']);
        $this->assertEquals('password', $user->password);
    }

    /** @test */
    function it_requires_an_email(){
        $this->expectException('Illuminate\Database\QueryException');
        $user = factory(\App\User::class)->create(['email' => null]);
    }

    /** @test */
    function it_requires_a_password(){
        $this->expectException('Illuminate\Database\QueryException');
        $user = factory(\App\User::class)->create(['password' => null]);
    }

    /** @test */
    function it_requires_a_name()
    {
        $this->expectException('Illuminate\Database\QueryException');
        $user = factory(\App\User::class)->create(['name' => null]);
    }

    /** @test */
    public function it_has_an_id()
    {
        $uut = factory(\App\User::class)->create();
        $this->assertGreaterThan(0, $uut->id);
    }
}

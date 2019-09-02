<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{
    /**
     * Create new account
     *
     * @return void
     */
    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'Joery')
                    ->type('email', 'joery@bieponline.local')
                    ->type('password', 'Admin123!')
                    ->type('#password-confirm', 'Admin123!')
                    ->press('Registreer')
                    ->assertPathIs('/home');
        });
    }
}

<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends DuskTestCase
{
    /**
     * Open user page, create a new user
     *
     * @return void
     */
    public function testUserCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@bieponline.local')
                    ->type('password', 'Admin123!')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->visit('/user')
                    ->assertPathIs('/user')
                    ->press('.btn-success')
                    ->type('name', 'Geffrey de Winter')
                    ->type('email', 'Geffrey@fabulous.nl')
                    ->type('password', 'Admin123!')
                    ->type('new_password_confirmation', 'Admin123!')
                    ->press('Opslaan')
                    ->assertPathIs('/user/create');
        });
    }

    /**
     * Open user page, edit an existing user
     *
     * @return void
     */
    public function testUserEdit()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/user')
                    ->press('.table-text')
                    ->clickLink('Bewerken')
                    ->type('name', 'Geffrey de Winter')
                    ->type('email', 'Geffrey@fabulous.nl')
                    ->type('password', 'Admin123!')
                    ->type('new_password_confirmation', 'Admin123!')
                    ->click('role_id')
                    ->type('Le')
                    ->select('location_id', 'HZ University')
                    ->press('Opslaan')
                    ->assertSee('is bijgewerkt.');
        });
    }

     public function testUserDelete()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertPathIs('/user/1/edit')
                    ->visit('/user')
                    ->press('.table-text')
                    ->clickLink('Verwijderen')
                    ->type('name', 'Geffrey de Winter')
                    ->type('email', 'Geffrey@fabulous.nl')
                    ->type('password', 'Admin123!')
                    ->type('new_password_confirmation', 'Admin123!')
                    ->select('role_id', 'Leerling')
                    ->select('location_id', 'HZ University')
                    ->press('Opslaan')
                    ->assertSee('is bijgewerkt.');
        });
    }

}

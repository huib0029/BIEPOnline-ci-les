<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RoleTest extends DuskTestCase
{
    /**
     * Open role page, create a new role
     *
     * @return void
     */
    public function testRoleCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@bieponline.local')
                    ->type('password', 'Admin123!')
                    ->press('Login')
                    ->visit('/role')
                    ->visit('/role/create')
                    ->type('name', 'Gebruiker')
                    ->press('Opslaan')
                    ->assertSee('Gebruiker is toegevoegd.');
        });
    }
    public function testRoleEdit()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/role')
                    ->press('.table-text')
                    ->press('.fa-pencil')
                    ->type('name', 'Gebruiker geedit')
                    ->press('Opslaan')
                    ->assertSee('Gebruiker geedit is bijgewerkt.');
        });
    }
    public function testRoleDelete()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/role')
                ->press('.table-text')
                ->press('Verwijderen')
                ->acceptDialog()
                ->assertSee('Gebruiker geedit is verwijderd.');
        });
    }

    /**
     * Open role page, edit an existing role
     *
     * @return void
     */
}

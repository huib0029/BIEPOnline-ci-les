<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LocationTest extends DuskTestCase
{
    /**
     * Open location page, create a new location
     *
     * @return void
     */
    public function testLocationCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@bieponline.local')
                    ->type('password', 'Admin123!')
                    ->press('Login')
                    ->visit('/location')
                    ->visit('/location/create')
                    ->type('name', 'De Stroming')
                    ->press('Opslaan')
                    ->assertSee('De Stroming is toegevoegd.');
        });
    }
    public function testLocationEdit()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/location')
                    ->press('.table-text')
                    ->press('.fa-pencil')
                    ->type('name', 'De Stroming geedit')
                    ->press('Opslaan')
                    ->assertSee('De Stroming geedit is bijgewerkt.');
        });
    }
    public function testLocationDelete()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/location')
                ->press('.table-text')
                ->press('Verwijderen')
                ->acceptDialog()
                ->assertSee('De Stroming geedit is verwijderd.');
        });
    }

    /**
     * Open location page, edit an existing location
     *
     * @return void
     */

}

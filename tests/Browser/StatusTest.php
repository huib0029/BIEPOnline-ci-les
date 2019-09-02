<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StatusTest extends DuskTestCase
{
    /**
     * Open status page, create a new status
     *
     * @return void
     */
    public function testStatusCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@bieponline.local')
                    ->type('password', 'Admin123!')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->click('button[type="button"]')
                    ->clickLink('Statussen')
                    ->assertPathIs('/status')
                    ->press('.btn-success')
                    ->type('status', 'Nieuw')
                    ->press('Opslaan')
                    ->assertSee('is toegevoegd.');
        });
    }

    /**
     * Open status page, edit an existing status
     *
     * @return void
     */
    public function testStatusEdit()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertPathIs('/status')
                    ->press('.table-text')
                    ->clickLink('Bewerken')
                    ->type('status', 'Nieuw/In Gebruik')
                    ->press('Opslaan')
                    ->assertSee('is bijgewerkt.');
        });
    }

    /**
     * Open author page, edit an existing author
     *
     * @return void
     */
    public function testStatusDelete()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertPathIs('/status')
                ->press('.table-text')
                ->clickLink('Verwijderen')
                ->assertDialogOpened('Weet u zeker dat u deze status wilt verwijderen?')
                ->acceptDialog()
                ->assertSee('is verwijderd.');
        });
    }
}

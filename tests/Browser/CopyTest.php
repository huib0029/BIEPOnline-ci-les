<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CopyTest extends DuskTestCase
{
    /**
     * Open user page, create a new user
     *
     * @return void
     */
    public function testCopyCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@bieponline.local')
                    ->type('password', 'Admin123!')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->clickLink('Exemplaren')
                    ->assertPathIs('/copy')
                    ->press('.btn-success')
                    ->type('datebought', '2017-05-01')
                    ->select('location_id', 'Bibliotheek de Stroming')
                    ->select('book_id', 'Harry Potter and the Deathly Hallows')
                    ->select('status_id', 'in gebruik')
                    ->press('Opslaan')
                    ->assertSee('is toegevoegd.');
        });
    }

    /**
     * Open user page, edit an existing user
     *
     * @return void
     */
    public function testCopyEdit()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertPathIs('/copy')
                    ->press('.table-text')
                    ->clickLink('Bewerken')
                    ->type('datebought', '2017-05-02')
                    ->select('location_id', 'Bibliotheek de Stroming')
                    ->select('book_id', 'Harry Potter and the Deathly Hallows')
                    ->select('status_id', 'afgeschreven')
                    ->press('Opslaan')
                    ->assertSee('is bijgewerkt.');
        });
    }
}

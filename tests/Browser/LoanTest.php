<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoanTest extends DuskTestCase
{
    /**
     * Open user page, create a new user
     *
     * @return void
     */
    public function testLoanCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@bieponline.local')
                    ->type('password', 'Admin123!')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->clickLink('Uitlenen')
                    ->assertPathIs('/loan')
                    ->press('.btn-success')
                    ->type('startdate', '2017-05-08')
                    ->type('expirydate', '2017-05-15')
                    ->select('user_id', 'Administrator')
                    ->select('copy_id', '1')
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
    public function testLoanEdit()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertPathIs('/loan')
                    ->press('.table-text')
                    ->clickLink('Bewerken')
                    ->type('startdate', '2017-05-08')
                    ->type('expirydate', '2017-05-15')
                    ->select('user_id', 'Administrator')
                    ->select('copy_id', '1')
                    ->select('status_id', 'in gebruik')
                    ->press('Opslaan')
                    ->assertSee('is bijgewerkt.');
        });
    }

    /**
     * Open author page, edit an existing author
     *
     * @return void
     */
    public function testLoanDelete()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertPathIs('/loan')
                ->press('.table-text')
                ->clickLink('Verwijderen')
                ->assertDialogOpened('Weet u zeker dat u deze uitleen wilt verwijderen?')
                ->acceptDialog()
                ->assertSee('is verwijderd.');
        });
    }
}

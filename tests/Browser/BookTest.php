<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BookTest extends DuskTestCase
{
    /**
     * Open book page, create a new book
     *
     * @return void
     */
    public function testBookCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@bieponline.local')
                    ->type('password', 'Admin123!')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->clickLink('Boeken')
                    ->assertPathIs('/book')
                    ->press('.btn-success')
                    ->type('isbn', '9780141036144')
                    ->type('title', 'Nineteen Eighty-Four')
                    ->type('author_id', 'George Orwell')
                    ->select('category_id', 'Voorleesboeken')
                    ->press('Opslaan')
                    ->assertSee('is toegevoegd.');
        });
    }

    /**
     * Open book page, edit an existing book
     *
     * @return void
     */
    public function testBookEdit()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertPathIs('/book')
                    ->press('.table-text')
                    ->clickLink('Bewerken')
                    ->type('isbn', '9780141036144')
                    ->type('title', 'Nineteen Eighty-Four')
                    ->type('author_id', 'George Orwell')
                    ->select('category_id', 'Voorleesboeken')
                    ->press('Opslaan')
                    ->assertSee('is bijgewerkt.');
        });
    }
}

<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryTest extends DuskTestCase
{
    /**
     * Open category page, create a new category
     *
     * @return void
     */
    public function testCategoryCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@bieponline.local')
                    ->type('password', 'Admin123!')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->click('button[type="button"]')
                    ->clickLink('Administratie')
                    ->clickLink('Categorieën')
                    ->assertPathIs('/category')
                    ->press('.btn-success')
                    ->type('name', 'Leesboeken voor gevorderden')
                    ->type('color', 'paars')
                    ->press('Opslaan')
                    ->assertSee('is toegevoegd.');
        });
    }

    /**
     * Open category page, edit an existing category
     *
     * @return void
     */
    public function testCategoryEdit()
    {
        $this->browse(function (Browser $browser) {
            $browser->assertPathIs('/category')
                    ->press('.table-text')
                    ->clickLink('Bewerken')
                    ->type('name', 'Leesboeken voor beginners & gevorderden')
                    ->type('color', 'zwart')
                    ->press('Opslaan')
                    ->assertSee('is bijgewerkt.');
        });
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BooksTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CopiesTableSeeder::class);
        $this->call(LoansTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
    }
}

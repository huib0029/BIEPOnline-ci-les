<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [

                'isbn'        => '9780545139700',
                'title'       => 'Harry Potter and the Deathly Hallows',
                'author_id'   => 1,
                'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at'  => \Carbon\Carbon::now()->toDateTimeString(),
                'category_id' => 1,
            ]
        ]);
    }
}

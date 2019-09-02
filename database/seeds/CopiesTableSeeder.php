<?php

use Illuminate\Database\Seeder;

class CopiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('copies')->insert(
            [
                'datebought' => '2017-02-22',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'book_id' => '1',
                'location_id' => '1',
                'status_id' => '1',
            ]);
    }
}

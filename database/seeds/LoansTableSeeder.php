<?php

use Illuminate\Database\Seeder;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loans')->insert(
            [
                'startdate' => '2017-02-22',
                'expirydate' => '2017-03-05',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'copy_id' => '1',
                'user_id' => '1',
                'status_id' => '1',
            ]);
    }
}

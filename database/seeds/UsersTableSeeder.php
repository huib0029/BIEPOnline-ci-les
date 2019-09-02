<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Administrator',
                'email' => env('APP_EMAIL', 'admin@bieponline.local'),
                'password' => bcrypt('Admin123!'),
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'location_id' => 1,
                'role_id' => 1,
            ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $user = \App\User::create([
            "name"     => "hesham",
            "email"    => "hesham@adel.com",
            "password" => bcrypt('0123456789'),

        ]);

    } // End Of Run

} // End Of Seeder

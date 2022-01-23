<?php

use App\Models\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Delete Old Data & Make New
        DB::table('genders')->delete();

        $genders = [
            ['en'=> 'Male', 'ar'=> 'ذكر'],
            ['en'=> 'Female', 'ar'=> 'انثي'],

        ];
        foreach ($genders as $ge) {
            Gender::create(['Name' => $ge]);
        }
    } // End Of Run

} // End Of Seeder

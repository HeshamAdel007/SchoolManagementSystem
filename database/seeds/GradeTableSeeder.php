<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Grade;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Grades')->delete();

        $grades = [
            ['en'=> 'Primary School', 'ar'=> 'المرحلة الأبتدائية'],
            ['en'=> 'Secondary School', 'ar'=> 'المرحلة الأعدادية'],
            ['en'=> 'Hight School', 'ar'=> 'المرحلة الثانوية'],

        ];
        foreach ($grades as $grade) {
            Grade::create(['Name' => $grade]);
        }

    } // End Of Run

} // End Of Seeder

<?php

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Classrooms')->delete();
        $classrooms = [
            ['en'=> 'First Grade', 'ar'=> 'الصف الاول'],
            ['en'=> 'Second Grade', 'ar'=> 'الصف الثاني'],
            ['en'=> 'Third Grade', 'ar'=> 'الصف الثالث'],
        ];

        foreach ($classrooms as $classroom) {
            Classroom::create([
            'Name_Class' => $classroom,
            'Grade_id' => Grade::all()->unique()->random()->id
            ]);
        }

    } // End Of Run

} // End Of Seeder

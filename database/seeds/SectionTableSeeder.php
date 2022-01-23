<?php

use Illuminate\Database\Seeder;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();

        $Sections = [
            ['en' => 'First Section', 'ar' => 'القسم الاول'],
            ['en' => 'Second Section', 'ar' => 'القسم الثاني'],
            ['en' => 'Third Section', 'ar' => 'القسم الثالث'],
        ];

        foreach ($Sections as $section) {
            Section::create([
                'Name_Section' => $section,
                'Status'       => 1,
                'Grade_id'     => Grade::all()->unique()->random()->id,
                'Class_id'     => ClassRoom::all()->unique()->random()->id
            ]);
        }

    } // End Of Run

} // End Of Seeder

<?php

use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\Specialization;
use App\Models\Gender;
use Illuminate\Support\Facades\DB;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('teachers')->delete();
      $teachername = [
        ['en'=> 'Hesham', 'ar'=> 'هشام'],
      ];
      foreach ($teachername as $name) {
        $teacher = Teacher::create([
          "Email"               => "hesham@teacher.com",
          "Name"                => $name,
          "Password"            => bcrypt('0123456789'),
          "Joining_Date"        => "2022-01-01",
          "Address"             => "Alex",
          "Specialization_id"   => Specialization::all()->unique()->random()->id,
          "Gender_id"           => Gender::all()->unique()->random()->id,
        ]);
      }

    } // End Of Run

} // End Of Seeder

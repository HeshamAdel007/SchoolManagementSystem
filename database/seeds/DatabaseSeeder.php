<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
        UserTableSeeder::class,
        GradeTableSeeder::class,
        BloodTableSeeder::class,
        NationalitiesTableSeeder::class,
        ReligionTableSeeder::class,
        ParentTableSeeder::class,
        SpecializationsTableSeeder::class,
        GenderTableSeeder::class,
        ClassroomTableSeeder::class,
        TeachersTableSeeder::class,
        SectionTableSeeder::class,
        SettingsTableSeeder::class,
      ]);

    } // End Of Run

} // End Of Seeder

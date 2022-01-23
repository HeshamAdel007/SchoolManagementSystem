<?php

use Illuminate\Database\Seeder;
use App\Models\My_Parent;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\Type_Blood;
use Illuminate\Support\Facades\DB;

class ParentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my__parents')->delete();

            $my_parents                         = new My_Parent();

            // Father Info
            $my_parents->email                  = 'adel@adel.com';
            $my_parents->password               = bcrypt('0123456789');
            $my_parents->Name_Father            = ['en' => 'adel', 'ar' => 'عادل '];
            $my_parents->National_ID_Father     = '965215478568';
            $my_parents->Passport_ID_Father     = '523654147856';
            $my_parents->Phone_Father           = '01275372663';
            $my_parents->Job_Father             = ['en' => 'programmer', 'ar' => 'مبرمج'];
            $my_parents->Nationality_Father_id  = Nationalitie::all()->unique()->random()->id;
            $my_parents->Blood_Type_Father_id   = Type_Blood::all()->unique()->random()->id;
            $my_parents->Religion_Father_id     = Religion::all()->unique()->random()->id;
            $my_parents->Address_Father         ='الأسكندرية';

            // Mother Info
            $my_parents->Name_Mother            = ['en' => 'Mother', 'ar' => 'ماما '];
            $my_parents->National_ID_Mother     = '7895214563251';
            $my_parents->Passport_ID_Mother     = '213654789514';
            $my_parents->Phone_Mother           = '01275372663';
            $my_parents->Job_Mother             = ['en' => 'Teacher', 'ar' => 'معلمة'];
            $my_parents->Nationality_Mother_id  = Nationalitie::all()->unique()->random()->id;
            $my_parents->Blood_Type_Mother_id   = Type_Blood::all()->unique()->random()->id;
            $my_parents->Religion_Mother_id     = Religion::all()->unique()->random()->id;
            $my_parents->Address_Mother         ='الأسكندريسة';
            $my_parents->save();

    } // End Of Run

} // End Of Seeder

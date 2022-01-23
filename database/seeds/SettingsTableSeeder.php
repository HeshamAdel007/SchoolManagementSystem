<?php
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('settings')->delete();

      $data = [
        ['key' => 'school_title', 'value' => 'Schoot Title'],
        ['key' => 'school_name', 'value' => 'International Schools'],
        ['key' => 'current_session', 'value' => '2022-2023'],
        ['key' => 'end_first_term', 'value' => '02-01-2022'],
        ['key' => 'end_second_term', 'value' => '06-01-2023'],
        ['key' => 'phone', 'value' => '01275372663'],
        ['key' => 'address', 'value' => 'Egypt,Alex'],
        ['key' => 'school_email', 'value' => 'heshamadel528@gmail.com'],
        ['key' => 'logo', 'value' => 'hesham.jpg'],
      ];

      DB::table('settings')->insert($data);

    } // End Of Run

} // End Of Seeder

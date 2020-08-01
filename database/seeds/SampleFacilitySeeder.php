<?php

use Illuminate\Database\Seeder;

class SampleFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->insert([
            'name' => '施設が選択されていません',
            'facility_type' => '訪問介護',
            'opening_hours' => '8:00:00',
            'closing_hours' => '18:00:00',
            'holiday' => '1111111',
        ]);
    }
}

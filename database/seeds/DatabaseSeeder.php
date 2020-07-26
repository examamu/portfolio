<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SampleFacilitySeeder::class);
        $this->call(SampleUserSeeder::class);
        $this->call(SampleCustomerSeeder::class);
    }
}

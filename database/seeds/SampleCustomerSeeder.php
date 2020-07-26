<?php

use Illuminate\Database\Seeder;

class SampleCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = 
        [
            ['田中太郎',1,5,1],
            ['飯田義継',1,2,1],
            ['森本和則',0,1,1],
            ['山田義幸',0,2,1],
            ['原田修',1,1,1],
            ['大濱シヅヱ',1,2,0],
        ];

        foreach ($customers as $customer){
            DB::table('customers')->insert([

                'name' => $customer[0],
                'insurer_number' => $customer[1],
                'nursing_care_level' => $customer[2],
                'status' => $customer[3],
                ]
            );
        }
    }
}
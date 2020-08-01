<?php

use Illuminate\Database\Seeder;

class SampleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('password');
        DB::table('users')->insert([
            'name' => 'testuser',
            'email' => 'example@gmail.com',
            'password' =>  $password,
        ]);

        

    }
}

<?php

use Illuminate\Database\Seeder;

class UsertypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            [
                'name' => 'admin'
            ],
            [
                'name' => 'pro',
            ]
            ,[
                'name' => 'user'
            ]

        ]);
    }
}

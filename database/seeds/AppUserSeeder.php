<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AppUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('APP_USER')->insert([ 
        	'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        	'created_by' => 0,
        	'username' => 'admin',
            'full_name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'enabled' => true,
            'role' => 'ADMINISTRATOR'
        ]);

        DB::table('APP_USER')->insert([ 
        	'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        	'created_by' => 0,
        	'username' => 'maverick',
            'full_name' => 'Alvinditya Saputra',
            'email' => 'maverick@test.com',
            'password' => Hash::make('password'),
            'enabled' => true,
            'role' => 'OPS'
        ]);
    }
}

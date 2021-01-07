<?php

use Illuminate\Database\Seeder;

class AppUserMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('APP_USER_MENU')->insert([ 
        	'created_at' => DB::raw('CURRENT_TIMESTAMP'),
        	'created_by' => 0,
        	'user_id' => 1,
            'menu' => 'user-maintenance'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use TeachMe\Entities\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->createAdmin();
    }

    private function createAdmin()
    {
    	User::create([
    		'name' => 'Javier Villarroel',
    		'email' => 'javier.villarroel.oyarzun@gmail.com',
    		'password' => bcrypt('admin')
    	]);
    }
}

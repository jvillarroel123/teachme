<?php

use TeachMe\Entities\User;
use Faker\Generator;
use Faker\Factory as Faker;

class UserTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new User();
    }

    public function getDummyData(Generator $faker, array $customValues = array() )
    {
        return [
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret')
            ];
    }

    public function run()
    {
        //
        $this->createAdmin();
        $this->createMultiple(50);
    }

    private function createAdmin()
    {
    	$this->create([
    		'name' => 'Javier Villarroel',
    		'email' => 'javier.villarroel.oyarzun@gmail.com',
    		'password' => bcrypt('admin')
    	]);
    }
}

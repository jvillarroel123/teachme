<?php

use TeachMe\Entities\Ticket;
use TeachMe\Entities\User;
use Faker\Generator;
use Faker\Factory as Faker;

class TicketTableSeeder extends BaseSeeder
{
    protected $total = 250;
    
    public function getModel()
    {
        return new Ticket();
    }

    public function getDummyData(Generator $faker, array $customValues = array() )
    {
        return [
            'title'		=> $faker->sentence(),
            'status'	=> $faker->randomElement(['open','open','closed']),
            //'user_id'	=> $this->getRandom('User')->id
            'user_id'	=> User::all()->random()->id
        ];
    }

}

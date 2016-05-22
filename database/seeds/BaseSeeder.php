<?php

use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Database\Seeder;

abstract class BaseSeeder extends Seeder{

	//protected para que puedan ser accedidos en la clase hija
	protected function createMultiple($total, array $customValues = array())
	{
		for ($i=0; $i < $total; $i++) { 
			# code...
			$this->create($customValues);
		}
	}

	abstract public function getModel();
	abstract public function getDummyData(Generator $faker, array $customValues = array());

	//hago que el metodo create acepte valores personalizados
	protected function create(array $customValues = array())
	{
		$values = $this->getDummyData(Faker::create(), $customValues);
		$values = array_merge($values, $customValues);
		$this->getModel()->create($values);
	}

}
<?php

namespace App\Support\Facades;


use Illuminate\Support\Facades\Facade;

class Phoner extends Facade {

	public static function getFacadeAccessor()
	{
		return 'phoner';
	}
}
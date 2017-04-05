<?php

use Illuminate\Database\Seeder;

class PhoneTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		collect(static::types())->each(function($item, $key) {
			Myrtle\Core\Phones\Models\PhoneType::updateOrCreate(['name' => $item]);
		});
    }

    public static function types()
    {
        return ['Home', 'Fax', 'Mobile', 'Office'];
    }
}

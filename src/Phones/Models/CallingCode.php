<?php

namespace Myrtle\Core\Phones\Models;

use Illuminate\Database\Eloquent\Model;
use Myrtle\Addresses\Models\Country;

class CallingCode extends Model
{
	protected $fillable = ['country_id', 'number'];

    public function country()
	{
		return $this->belongsTo(Country::class);
	}
}

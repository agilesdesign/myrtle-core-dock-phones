<?php

namespace Myrtle\Core\Phones\Models\Traits;

use Myrtle\Phones\Models\Phone;

trait Phoneable {

	public function phones()
	{
		return $this->morphMany(Phone::class, 'phoneable');
	}
}
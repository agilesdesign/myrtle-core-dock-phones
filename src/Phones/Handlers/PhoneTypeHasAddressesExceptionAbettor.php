<?php

namespace Myrtle\Core\Phones\Handlers;

use Exception;
use Flasher\Support\Notifier;
use Exceptum\Contracts\Abettor;

class PhoneTypeHasAddressesExceptionAbettor implements Abettor
{
	public function render($request, Exception $exception)
	{
		flasher()->alert('Phone Type is associated to phone numbers and cannot be removed', Notifier::DANGER);

		return redirect()->back();
	}
}
<?php

namespace Myrtle\Core\Phones\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Myrtle\Phones\Exceptions\PhoneTypeHasAddressesException;
use Myrtle\Phones\Models\PhoneType;

class PhonesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('eloquent.deleting: ' . PhoneType::class, function ($type)
        {
            if($type->phones->isNotEmpty())
            {
                throw new PhoneTypeHasAddressesException;
            }
        });
    }
}

<?php

namespace Myrtle\Core\Phones\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use libphonenumber\PhoneNumberUtil;

class PhonerServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
		App::singleton('phoner', PhoneNumberUtil::getInstance());
    }
}

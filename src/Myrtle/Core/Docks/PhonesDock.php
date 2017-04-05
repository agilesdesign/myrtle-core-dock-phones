<?php

namespace Myrtle\Core\Docks;

use Myrtle\Phones\Models\PhoneType;
use Illuminate\Support\Facades\View;
use Myrtle\Phones\Policies\PhonesPolicy;
use Myrtle\Phones\Providers\PhonerServiceProvider;
use Myrtle\Phones\Providers\PhonesServiceProvider;
use Myrtle\Phones\Exceptions\PhoneTypeHasAddressesException;
use Myrtle\Phones\Handlers\PhoneTypeHasAddressesExceptionAbettor;

class PhonesDock extends Dock
{
    /**
     * Description for Dock
     *
     * @var string
     */
    public $description = 'Phone and Phone Type manager';

    /**
     * Exceptum mappings
     *
     * @var array
     */
    public $exceptumMap = [
        PhoneTypeHasAddressesException::class => PhoneTypeHasAddressesExceptionAbettor::class,
    ];

    /**
     * Explicit Gate definitions
     *
     * @var array
     */
    public $gateDefinitions = [
        'phones.admin' => PhonesPolicy::class . '@admin'
    ];

    /**
     * Policy mappings
     *
     * @var array
     */
    public $policies = [
        PhonesPolicy::class => PhonesPolicy::class
    ];

    /**
     * List of providers to be registered
     *
     * @var array
     */
    public $providers = [
        PhonerServiceProvider::class,
        PhonesServiceProvider::class,
    ];

    /**
     * List of config file paths to be loaded
     *
     * @return array
     */
    public function configPaths()
    {
        return [
            'docks.' . self::class => dirname(__DIR__, 2) . '/config/docks/phones.php',
            'abilities' => dirname(__DIR__, 2) . '/config/abilities.php',
        ];
    }

    /**
     * List of migration file paths to be loaded
     *
     * @return array
     */
    public function migrationPaths()
    {
        return [
            dirname(__DIR__, 2) . '/database/migrations',
        ];
    }

    /**
     * List of routes file paths to be loaded
     *
     * @return array
     */
    public function routes()
    {
        return [
            'admin' => dirname(__DIR__, 2) . '/routes/admin.php',
        ];
    }

    /**
     * Boot View Composers
     */
    public function viewComposers()
    {
        View::composer(['admin::*.phones.create', 'admin::*.phones.edit'], function ($view)	{

            $phonetypes = PhoneType::pluck('name', 'id');

            //$codes = CallingCode::all()->keyBy('id')->sortBy('number')->map(function($code, $key) {
            //    return $code->number  . ' ' . $code->country->alpha_3_code;
            //})->toArray();
            //
            //$defaultCode = CallingCode::where('number', 1)->get()->filter(function($code, $key) {
            //    return $code->country->alpha_2_code === 'US';
            //})->first()->id;

            $view->with('phonetypes', $phonetypes);
                //->with('codes', $codes)
                //->with('defaultCode', $defaultCode);
        });
    }
}

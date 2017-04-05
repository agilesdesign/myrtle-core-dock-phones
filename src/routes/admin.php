<?php

Route::group(['prefix' => 'phones', 'as' => 'phones.'], function () {
    Route::resource('types', \Myrtle\Core\Phones\Http\Controllers\Administrator\PhoneTypesController::class,
        ['except' => ['show']]);
});

Route::group(['prefix' => 'docks/phones/types', 'as' => 'docks.phones.types.'], function () {
    Route::get('seed', [
        'uses' => \Myrtle\Core\Phones\Http\Controllers\Administrator\PhoneTypesSeedController::class . '@create',
        'as' => 'seed.create'
    ]);
    Route::post('seed', [
        'uses' => \Myrtle\Core\Phones\Http\Controllers\Administrator\PhoneTypesSeedController::class . '@store',
        'as' => 'seed.store'
    ]);
});
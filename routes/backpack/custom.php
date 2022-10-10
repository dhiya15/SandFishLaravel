<?php

use App\Http\Controllers\Admin\MagasinCrudController;
use App\Http\Controllers\Admin\RegistrationCrudController;
use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('magasin', 'MagasinCrudController');
    Route::crud('contact', 'ContactCrudController');
    Route::crud('section', 'SectionCrudController');
    Route::crud('publication', 'PublicationCrudController');
    Route::post('shop-update', [MagasinCrudController::class, 'updateShop'])->name('shop.update');
    Route::get('accept-student/{id}', [RegistrationCrudController::class, 'acceptStudent']);
    Route::get('refuse-student/{id}', [RegistrationCrudController::class, 'refuseStudent']);
    Route::get('switch-category1/{id}', [RegistrationCrudController::class, 'switchCategory1']);
    Route::get('switch-category2/{id}', [RegistrationCrudController::class, 'switchCategory2']);
    Route::get('switch-category3/{id}', [RegistrationCrudController::class, 'switchCategory3']);
    Route::crud('user', 'UserCrudController');
    Route::crud('registration', 'RegistrationCrudController');
}); // this should be the absolute last line of this file

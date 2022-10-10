<?php

use App\Http\Controllers\Admin\RegistrationCrudController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['cors'])->group(function () {
    Route::get('/magasin',[\App\Http\Controllers\MagasinController::class,'magasin']);
    Route::post('/contact',[\App\Http\Controllers\ContactController::class,'contact']);
    Route::get('/publications',[\App\Http\Controllers\PublicationController::class,'publications']);
    Route::get('/init',[\App\Http\Controllers\Controller::class,'init']);
    Route::get('/publication/{id}',[\App\Http\Controllers\Controller::class,'publication']);
    Route::post('/new-registration', [RegistrationCrudController::class, 'addRegistration']);
    Route::post('/check-category', [RegistrationCrudController::class, 'checkCategory']);
});



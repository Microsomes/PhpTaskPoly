<?php

use App\Http\Controllers\BreedController;
use App\Http\Controllers\ParkController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([ ], function () {
    Route::get('/breed',[BreedController::class, 'index']);

    Route::get('/breed/random',[BreedController::class, 'randomBreed']);
    
    Route::get('/breed/{breedid}/image',[BreedController::class, 'getRandomImageByBreedId']);
    
    Route::get('/breed/{breedid}',[BreedController::class, 'getBreedById']);
    
    
    Route::post('/{user}/associate',[UserController::class, 'associate']);
    
    Route::post('/park/{park}/breed',[ParkController::class, 'associate']);
});


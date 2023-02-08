<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LawscategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\DisciplinaryController;
use App\Http\Controllers\ProbonoController;


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

Route::group([
    'middleware' => 'api'
], function($router){
    Route::get('/search-vertical', [SearchController::class, 'searchVertical']);
    Route::get('/search', [SearchController::class, 'searchApi']);
    Route::get('/lawcat', [LawscategoryController::class, 'index']);


    Route::get('/users/deseacedApi', [UserController::class, 'deseacedApi']);
    Route::get('/users/struckOffApi', [UserController::class, 'struckOffApi']);
    Route::get('/users/suspendedApi', [UserController::class, 'suspendedApi']);
    Route::get('/users/inactiveApi', [UserController::class, 'inactiveApi']);
    Route::get('/users/active', [UserController::class, 'active']);
    Route::get('/users/individual', [UserController::class, 'api']);

    Route::get('/meetings', [MeetingController::class, 'api']);
    Route::get('/cases', [DisciplinaryController::class, 'api']);
    Route::get('/probono', [ProbonoController::class, 'api']);
    Route::get('/users/organization', [OrganizationController::class, 'api']);
    Route::delete('/users/organization/{organization}', [OrganizationController::class, 'destroy']);
    Route::put('/users/individual/{user}', [UserController::class, 'suspend']);
    Route::delete('/users/individual/{user}', [UserController::class, 'destroy']);
});

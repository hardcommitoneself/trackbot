<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\OrganizationController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('meets', MeetController::class)
    ->only(['index', 'show']);

Route::apiResource('events', EventController::class)
    ->only(['index', 'show']);

Route::apiResource('organizations', OrganizationController::class)
    ->only(['index', 'show']);

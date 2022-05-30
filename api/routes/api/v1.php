<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MeetController;
use App\Http\Controllers\MeetDivisionController;
use App\Http\Controllers\MeetEventController;
use App\Http\Controllers\MeetEventRoundController;
use App\Http\Controllers\MeetSessionController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\VenueController;
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

Route::apiResource('venues', VenueController::class)
    ->only(['index', 'show']);

Route::apiResource('address', AddressController::class)
    ->only(['show']);

Route::apiResource('meetSessions', MeetSessionController::class)
    ->only(['index', 'show']);

Route::apiResource('meetDivisions', MeetDivisionController::class)
    ->only(['index', 'show']);

Route::apiResource('meetEvents', MeetEventController::class)
    ->only(['index', 'show']);

Route::apiResource('meetEventRounds', MeetEventRoundController::class)
    ->only(['index', 'show']);

Route::apiResource('organizations', OrganizationController::class)
    ->only(['index', 'show']);

<?php

use App\Http\Controllers\MeetController;
use App\Models\Meet;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

//Route::get('meets', function() {
//    // If the Content-Type and Accept headers are set to 'application/json',
//    // this will return a JSON structure. This will be cleaned up later.
//    return \App\Http\Resources\MeetResource::collection(Meet::all());
//});

Route::get('meets', [MeetController::class, 'index']);

require __DIR__.'/auth.php';

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

// tmp route to create demo staff
Route::post('user', function () {
    $user            = new App\User();
    $user->password  = Hash::make('123@123a');
    $user->email     = 'staff@car.com';
    $user->name      = 'Staff';
    $token           = Str::random(80);
    $user->api_token = hash('sha256', $token);
    $user->save();

    return $token;
});

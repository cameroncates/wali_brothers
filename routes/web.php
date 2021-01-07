<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::domain('{role}.'.config('app.short_url'))->group(function() {
    
    Route::group(['prefix' => 'dashboard'], function() {
        
        Route::get('/', [App\Http\Controllers\Web\DashboardController::class, 'dashboard']);

    });
});

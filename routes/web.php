<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserCheck;
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

Route::prefix('user')->middleware([UserCheck::class])->group(function(){
    Route::post('register_user', 'HomeController@register_user');
    Route::post('login_user', 'HomeController@login_user');
    
    Route::post('create_unit', 'UnitController@CreateUnit');

    
});

Route::get('/{any}', "HomeController@index")->where('any', '.*');

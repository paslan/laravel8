<?php

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



Route::get('/contato', function(){
    return view('sites.contact');
});

Route::get('/empresa', function(){
    return 'Sobre a Empresa';
});

//Route::get('/teste', 'Admin\TestController@teste');


//Route::get('register', 'App\Http\Controllers\Api\RegisterController@register');

// sintaxe ação. 
use App\Http\Controllers\Admin\TestController;
 
Route::get('teste', [TestController::class, 'teste']);

Route::get('grava', [TestController::class, 'grava']);



Route::get('/', function () {
    return view('welcome');
});

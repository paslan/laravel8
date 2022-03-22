<?php

use Illuminate\Support\Facades\Route;


use App\Models\User;
use App\Services\GitHub;




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

Route::get('teste/{id}', 'App\Http\Controllers\TesteController@go')->name('teste.go');


Route::get('bling/{page}', 'App\Http\Controllers\BlingController@show')->name('bling.show');


Route::get('products/{id}/zoom', 'App\Http\Controllers\ProductController@zoom')->name('products.zoom');

Route::any('products/search', 'App\Http\Controllers\ProductController@search')->name('products.search');

Route::resource('products', 'App\Http\Controllers\ProductController'); //->middleware(['auth']);

Route::get('/user/{user}', function (User $user) {
    return $user;
});



Route::get('teste', function(){
    return response()->json([
        'name' => 'Abigail',
        'state' => 'CA',
    ]);
});

Route::get('teste2', function(User $user){
    $user = User::find(10);
    return view('teste', ['name' => $user->name]);
});

Route::get('teste3', function(){
    //$users = DB::select('select * from users');
    $users = DB::table('users')->get();
 
 
    foreach ($users as $user) {
        echo $user->id . ' - '.$user->name . '<br>';
    }
});


Route::get('teste4', function () {
    return User::paginate();
});




Route::get('login', function(){
    return 'login';
})->name('login');



// Route::put('products/{id}', 'App\Http\Controllers\ProductController@update')->name('products.update');
// Route::get('products/create', 'App\Http\Controllers\ProductController@create')->name('products.create');
// Route::get('products/{id}/edit', 'App\Http\Controllers\ProductController@edit')->name('products.edit');
// Route::delete('products/{id}/destroy', 'App\Http\Controllers\ProductController@destroy')->name('products.destroy');
// Route::post('products', 'App\Http\Controllers\ProductController@store')->name('products.store');

// Route::get('products/{id}', 'App\Http\Controllers\ProductController@show')->name('products.show');
// Route::get('products', 'App\Http\Controllers\ProductController@index')->name('products.index');



// use App\Http\Controllers\Admin\TestController;

// Route::prefix('admin')->group(function(){

//     Route::get('teste', [TestController::class, 'teste']);
//     Route::get('grava', [TestController::class, 'grava']);

// });


// Route::middleware([])->group(function(){

//     Route::prefix('admin')->group(function(){

//         Route::name('admin.') -> group(function(){

//             Route::get('/dashboard', function(){
//                 return 'Home Admin';
//             })->name('dashboard');
            
//             Route::get('/financeiro', function(){
//                 return 'Financeiro Admin';
//             })->name('finance');
            
//             Route::get('/produtos', function(){
//                 return 'Produtos Admin';
//             })->name('products');
    
//             Route::get('/', function(){
//                 return redirect()->route('admin.dashboard');
//             })->name('home');

//         });


//     });

// });


Route::group([
    'middleware' => [],
    'prefix' => 'admin'
], function(){

    Route::name('admin.') -> group(function(){
        Route::get('/dashboard', function(){
            return 'Home Admin';
        })->name('dashboard');
        
        Route::get('/financeiro', function(){
            return 'Financeiro Admin';
        })->name('finance');
        
        Route::get('/produtos', function(){
            return 'Produtos Admin';
        })->name('products');

        Route::get('/', function(){
            return redirect()->route('admin.dashboard');
        })->name('home');
    });
});


Route::get('/', function () {
    return view('welcome');
});

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

Route::get('/', function () {
    return view('home');
});


Auth::routes();
//Arahkan semua route ke home dan melakukan search, termasuk pada guest, member, dan admin
Route::get('/', 'PizzaController@pizzaMenu');
Route::get('/home', 'PizzaController@pizzaMenu');
Route::get('/', 'PizzaController@pizzaSearch');

//Arahkan ke pizza detail
Route::get('/pizza/{id}', 'PizzaController@pizzaDetail');


Route::get('/addpizza', function () {
    return view('add');
});

Route::post('/addedPizza', 'PizzaController@pizzaAdd')->name('pizzaAdds');

Route::get('/updatePizza/{id}', 'PizzaController@pizzaUpdateView');

Route::get('/deletePizza/{id}', 'PizzaController@pizzaDelete');

Route::post('/editedPizza/{id}', 'PizzaController@pizzaUpdate')->name('pizzaEdit');

Route::get('/viewAllUser', 'UserController@viewAllUser');

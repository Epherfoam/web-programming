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

Route::get('/', 'PizzaController@pizzaMenu');
Route::get('/home', 'PizzaController@pizzaMenu');
Route::get('/pizza/{id}', 'PizzaController@pizzaDetail');

// Route::get('/addpizza', 'PizzaController@pizzaSearch');

Route::get('/addpizza', function () {
    return view('add');
});

Route::post('/pizzaadded', 'PizzaController@pizzaAdd');

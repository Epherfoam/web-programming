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

//memberi view add terhadap admin yang ingin menambah pizza
Route::get('/addpizza', function () {
    return view('admin.add');
});

//Route yang berisi data pizza baru
Route::post('/addedPizza', 'PizzaController@pizzaAdd')->name('pizzaAdds');

//Route yang memberi view update terhadap admin dan berisi data pizza yang ingin update
Route::get('/updatePizza/{id}', 'PizzaController@pizzaUpdateView');
Route::post('/editedPizza/{id}', 'PizzaController@pizzaUpdate')->name('pizzaEdit');

//Route yang memberi view delete terhadap admin dan berisi data pizza yang ingin delete
Route::get('/deletePizza/{id}', 'PizzaController@pizzaDeleteView');
Route::get('/delete/{id}', 'PizzaController@pizzaDelete');

//Route yang memberi view allUser terhadap admin
Route::get('/viewAllUser', 'UserController@viewAllUser');


//Route yang berisi data pizza yang ingin delete
Route::post('/cartPizza/{id}', 'TransactionController@receiveCart');

//Route yang memberi view cart terhadap member
Route::get('/cart', 'TransactionController@viewCart');

//Route yang berisi data pizza yang ingin diperbaharui di cart
Route::post('/updateQuantity/{id}', 'TransactionController@updateCart');

//Route yang memberi view cart terhadap member data pizza yang ingin dihapus di cart
Route::get('/deleteCart/{id}', 'TransactionController@deleteCart');

//Route yang berisi data pizza yang ingin dihapus di cart
Route::post('/checkout', 'TransactionController@checkout');

//Route yang memberi view transaction history terhadap member
Route::get('/transactionHistory', 'TransactionController@viewTransaction');

//Route yang memberi view transaction history detail terhadap member/admin
Route::get('/history/{id}', 'TransactionController@viewTransactionHistory');

//Route yang memberi view transaction history terhadap admin
Route::get('/viewAllTransaction', 'TransactionController@viewAllTransaction');

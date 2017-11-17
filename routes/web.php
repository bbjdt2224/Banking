<?php

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

Route::get('/', 'AccountsController@index')->name('home');

Route::get('/account/{account}', 'AccountsController@account')->name("account");

Route::post('/deposite', 'TransactionsController@deposite')->name("deposite");

Route::post('/withdraw', 'TransactionsController@withdraw')->name("withdraw");

Route::get('/deposite/{account}', 'TransactionsController@addDeposite')->name("depositeAccount");

Route::get('/withdraw/{account}', 'TransactionsController@addWithdraw')->name("withdrawAccount");

Route::get('/edit/{account}/{id}', 'TransactionsController@edit')->name("edit");

Route::get('/delete/{account}/{id}', 'TransactionsController@delete')->name("delete");

Route::post('/edit', 'TransactionsController@editTransaction')->name('editTransaction');

Route::get('/newAccount', 'AccountsController@new')->name('newAccount');

Route::post('/createAccount', 'AccountsController@create')->name('createAccount');

Route::post('/search', 'TransactionsController@search')->name('search');
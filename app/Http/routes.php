<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers','CustomerController');
Route::resource('stocks','StockController');
Route::resource('investments','InvestmentController');
Route::get('customers/{id}/stringify', 'CustomerController@stringify');
Route::get('stocks/{id}/stringify', 'StockController@stringify');
Route::resource('mutualfunds','MutualFundsController');


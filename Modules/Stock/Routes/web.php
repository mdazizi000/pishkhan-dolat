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


Route::get('/buy-stock', 'StockHolderController@create')->name('register.stock');
Route::get('/stockholder-login', 'StockHolderController@loginPage')->name('stockholder.login');
Route::post('/stockholder-otp', 'StockHolderController@sendOtp')->name('stockholder.sendOtp');
Route::post('/stockholder-verify-otp', 'StockHolderController@verifyOtp')->name('stockholder.verifyOtp');
Route::get('/stockholder-getCode', 'StockHolderController@verifyOtpPage')->name('stockholder.getCode');
Route::post('/submit-stock', 'StockHolderController@store')->name('buy.stock');
Route::get('/verify','StockHolderController@verify');

Route::middleware('authStockHolder')->group(function () {
    Route::get('/stock-invoice/{id}', 'StockHolderController@invoice')->name('invoice.stock');
    Route::get('/stockholder-profile', 'StockHolderController@profile')->name('profile.stock');

    Route::get('stockholder-logout' , function (){
        auth()->guard('stock')->logout();
        return redirect()->route('stockholder.login');
    })->name('stockholder.logout');
});

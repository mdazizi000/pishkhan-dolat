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

use Modules\Admin\Http\Controllers\AdminController;

Route::prefix('fdcore')->middleware('authAdmin')->group(function () {
    Route::get('/', 'AdminController@dashboard')->name('dashboard');
    Route::resource('admins', 'AdminController');
    Route::resource('contents', 'ArticleController');
    Route::resource('banners', 'BannerController');
    Route::get('/contacts', 'AdminController@contactMessages')->name('contact.messages');
    Route::get('/contacts/{id}', 'AdminController@contactShow')->name('contact.show');
    Route::resource('stockholders', 'StockController');
    Route::get('stocks', 'StockController@stocksIndex')->name('stocks.index');
    Route::get('offices', [\Modules\Admin\Http\Controllers\OfficeController::class,'index'])->name('offices.list');
    Route::get('office/{id}/show', [\Modules\Admin\Http\Controllers\OfficeController::class,'show'])->name('offices.details');
    Route::get('office/{officeId}/users', [\Modules\Admin\Http\Controllers\OfficeController::class,'usersList'])->name('office-user.list');
    Route::get('stocks/{id}', 'StockController@stock')->name('stocks.show');
    Route::post('confirm/{id}/office', [\Modules\Admin\Http\Controllers\OfficeController::class,'confirmOffice'])->name('office-confirm');
    Route::post('reject/{id}/office', [\Modules\Admin\Http\Controllers\OfficeController::class,'rejectOffice'])->name('office-reject');
    Route::get('logout' , function (){
        auth()->guard('admin')->logout();
        return redirect()->route('admins.login');
    })->name('admins.logout');
});


Route::prefix('fdcore')->group(function () {
    Route::view('login', 'admin::login')->name('admins.login');
    Route::post('login',[AdminController::class,'login'])->name('admin.login');


});
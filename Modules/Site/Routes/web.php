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

Route::get('/', function () {
    return view('site::index');
});

Route::get('/contact-us', function () {
    return view('site::contact');
});

Route::post('/contact-store','SiteController@submitContent')->name('contact.store');

Route::get('/about-us', function () {
    return view('site::about');
});
Route::get('/content', 'SiteController@content');
Route::get('/contents', 'SiteController@contents');
Route::get('/content/{id}', 'SiteController@contentShow')->name('content.show');



Route::get('/terms-office',function (){
    return view('site::office.terms');
})->name('terms.office');
//Route::get('/register-office','OfficeController@registerPage')->name('register.office');


Route::resource('offices', 'OfficeController');

Route::post('offices/send-otp', 'OfficeController@sendOtp')->name('office.send-otp');
Route::post('offices/verify-otp', 'OfficeController@verifyOtp')->name('office.verifyOtp');
Route::get('/office-getCode', 'OfficeController@verifyOtpPage')->name('office.getCode');
Route::get('/office-login/password', 'OfficeController@passLogin')->name('office.login');
Route::post('/login/by-password', 'OfficeController@login')->name('office.password-login');


Route::middleware('authOffice')->group(function () {
    Route::get('/dashboard', 'OfficeController@dashboard')->name('office.dashboard');
    Route::get('/change-password', 'OfficeController@changePasswordPage')->name('office.change-password-page');
    Route::put('/office/change-password', 'OfficeController@changePassword')->name('office.change-password');
    Route::get('/user-incentives',function (){
        return view('site::office.user-incentives');
    })->name('user.incentives');
    Route::get('/office-user',function (){
        return view('site::office.submit-user');
    })->name('office.user');
    Route::post('/office/create-user', 'OfficeController@submitUser')->name('create.user');
    Route::get('office-logout' , function (){
        auth()->guard('office')->logout();
        return redirect()->to('/');
    })->name('office.logout');
});

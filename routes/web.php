<?php

use App\Http\Controllers\Controller;
use App\Http\Livewire\RegisterOfficeComponent;
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
    return view('welcome');
});
Route::get('/reload-captcha', [Controller::class, 'reloadCaptcha']);
Route::get('/register-office',RegisterOfficeComponent::class)->name('register.office');

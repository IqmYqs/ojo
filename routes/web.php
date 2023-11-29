<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/', function () { return view('welcome'); })->name('page.index');
    Route::get('/register', function () { return view('pages.register.register'); })->name('page.register');
    Route::get('/register/concent_form', function () { return view('pages.register.consent_form'); })->name('page.consentForm');
    Route::get('/login', function () { return view('pages.login.login'); })->name('page.login');
});

Route::middleware('auth')->group(function () {
        Route::get('/register/information', function () { return view('pages.register.information'); })->name('page.information');
        Route::get('/home', function () { return view('pages.home'); })->name('page.home');
});

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/register/information', [UserController::class, 'information'])->name('informations');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/set_reward', [UserController::class, 'set_reward'])->name('set.reward');




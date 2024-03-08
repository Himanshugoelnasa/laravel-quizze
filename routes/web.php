<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthLoginRegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizzController;

Auth::routes(['register' => false]);

Route::controller(AuthLoginRegisterController::class)->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::controller(HomeController::class)->group(function() {
        Route::get('/home', 'dashboard')->name('dashboard');
        Route::post('/logout', 'logout')->name('logout');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::controller(QuizzController::class)->group(function() {
        Route::get('/quizze-detail/{id}', 'quizze_detail')->name('quizze_detail');
        Route::get('/create-quizze', 'create_quizze')->name('create_quizze');
        Route::get('/previous-quizz', 'previous_quizze')->name('previous_quizze');
        Route::post('/submit-quizze', 'submit_quizze')->name('submit_quizze');
        Route::post('/end-quizze', 'end_quizze')->name('end_quizze');
        Route::get('/thankyou/{id}', 'thankyou')->name('thankyou');
    });
}); 


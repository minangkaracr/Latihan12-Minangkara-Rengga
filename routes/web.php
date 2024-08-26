<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('portfolio.index');
});

Route::get('/chatbot', function () {
    return view('chatbot.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Belajar Routes dan Request
// Ini belajar Grouping biasanya untuk versioning APInya
Route::group(['prefix'=> 'search'], function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'searchUser']);
    Route::get('/{user}', [App\Http\Controllers\UserController::class, 'findUser']);
});

Route::post('/response', [App\Http\Controllers\GeminiAIController::class, 'handleChat'])->name('chat');
// Route::get('/search', [App\Http\Controllers\UserController::class, 'searchUser']);
// Route::get('/id/{user}', [App\Http\Controllers\UserController::class, 'findUser']);

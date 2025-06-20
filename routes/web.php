<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('Home_page');

Route::get('/hello', function () {
    return 'hello';
})->name('hello');

Route::get('/greet/{name}', function ($name) {
    return 'hello ' . $name;
})->name('Dynamic_url_demo');

Route::get('/hallo', function () {
    return redirect()->route('hello');
})->name('redirect_url_to_active_url');

Route::fallback(function () {
    return view('Error404');
})->name('Error_404');

/* Start project related routes */

Route::get('/', function () {
    return view('home');
})->name('Home_page');
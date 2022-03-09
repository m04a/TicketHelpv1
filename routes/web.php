<?php

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
    return view('auth/login');
});

// ADMIN

Route::get('/dashboard', function () {
    return view('public/dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/users', function () {
Route::get('/admin/users', function () {
    return view('admin/users/index');
})->middleware(['auth'])->name('users');

Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth'])->name('users');

// USER

Route::get('/user/dashboard', function () {
    return view('user/dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/user/questions/list', function () {
    return view('user/questions/list');
})->middleware(['auth'])->name('questions');

Route::get('/question', function () {
    return view('public/question/index');
})->middleware(['auth'])->name('question');



require __DIR__.'/auth.php';

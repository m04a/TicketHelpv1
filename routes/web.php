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


Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/users', function () {
    return view('admin/users/index');
})->middleware(['auth'])->name('users');

Route::get('/devices', function () {
    return view('admin/devices/index');
})->middleware(['auth'])->name('devices');



require __DIR__.'/auth.php';

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
    return view('admin/dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/users', function () {
    return view('admin/users/index');
})->middleware(['auth'])->name('admin.users');

Route::get('/admin/users/create', function () {
    return view('admin/users/create');
})->middleware(['auth'])->name('admin.users.create');

Route::get('/admin/users/edit', function () {
    return view('admin/users/edit');
})->middleware(['auth'])->name('admin.users.edit');

Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth'])->name('users');

Route::get('/admin/breakdowns', function () {
    return view('admin/breakdowns/index');
})->middleware(['auth'])->name('admin.breakdowns');

Route::get('/admin/breakdowns/create', function () {
    return view('admin/breakdowns/create');
})->middleware(['auth'])->name('admin.breakdowns.create');

Route::get('/admin/breakdowns/edit', function () {
    return view('admin/breakdowns/edit');
})->middleware(['auth'])->name('admin.breakdowns.edit');

Route::get('/admin/departments', function () {
    return view('admin/departments/index');
})->middleware(['auth'])->name('admin.departments');

Route::get('/admin/departments/create', function () {
    return view('admin/departments/create');
})->middleware(['auth'])->name('admin.departments.create');

Route::get('/admin/departments/edit', function () {
    return view('admin/departments/edit');
})->middleware(['auth'])->name('admin.departments.edit');

// USER

Route::get('/user/dashboard', function () {
    return view('user/dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/user/questions/list', function () {
    return view('user/questions/list');
})->middleware(['auth'])->name('questions');

Route::get('/breakdown', function () {
    return view('user/breakdown/index');
})->middleware(['auth'])->name('user.breakdowns');

Route::get('/admin/types', function () {
    return view('admin/types/index');
})->middleware(['auth'])->name('user.types');

Route::get('/admin/types/create', function () {
    return view('admin/types/create');
})->middleware(['auth'])->name('user.types.create');


Route::get('/user/questions', function () {
    return view('user/questions/index');
})->middleware(['auth'])->name('user.questions');

require __DIR__.'/auth.php';

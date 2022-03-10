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


Route::middleware(['auth'])->group(function () {

    Route::middleware(['admin'])->group(function () {

        // ADMIN

        Route::get('/admin/dashboard', function () {
            return view('admin/dashboard');
        })->name('admin.dashboard');

        ///////////////////////////////////////////////////

        Route::get('/admin/users', function () {
            return view('admin/users/index');
        })->name('admin.users');

        Route::get('/admin/users/create', function () {
            return view('admin/users/create');
        })->name('admin.users.create');

        Route::get('/admin/users/edit', function () {
            return view('admin/users/edit');
        })->name('admin.users.edit');

        ///////////////////////////////////////////////////

        Route::get('/admin/devices', function () {
            return view('admin/devices/index');
        })->name('admin.devices');

        Route::get('/admin/devices/create', function () {
            return view('admin/devices/create');
        })->name('admin.devices.create');

        ///////////////////////////////////////////////////

        Route::get('/admin/suggestions/create', function () {
            return view('admin/suggestions/create');
        })->name('admin.suggestions.create');

        Route::get('/admin/suggestions/view', function () {
            return view('admin/suggestions/view');
        })->name('admin.suggestions.view');


        ///////////////////////////////////////////////////

        Route::get('/admin/breakdowns', function () {
            return view('admin/breakdowns/index');
        })->name('admin.breakdowns');

        Route::get('/admin/breakdowns/create', function () {
            return view('admin/breakdowns/create');
        })->name('admin.breakdowns.create');

        Route::get('/admin/breakdowns/edit', function () {
            return view('admin/breakdowns/edit');
        })->name('admin.breakdowns.edit');

        ///////////////////////////////////////////////////

        Route::get('/admin/departments', function () {
            return view('admin/departments/index');
        })->name('admin.departments');

        Route::get('/admin/departments/create', function () {
            return view('admin/departments/create');
        })->name('admin.departments.create');

        Route::get('/admin/departments/edit', function () {
            return view('admin/departments/edit');
        })->name('admin.departments.edit');

        ///////////////////////////////////////////////////

        Route::get('/admin/types', function () {
            return view('admin/types/index');
        })->name('user.types');

        Route::get('/admin/types/create', function () {
            return view('admin/types/create');
        })->name('user.types.create');
    });


    // USER

    Route::get('/user/dashboard', function () {
        return view('user/dashboard');
    })->name('user.dashboard');

    Route::get('/user/questions/list', function () {
        return view('user/questions/list');
    })->name('user.questions');

    Route::get('/user/breakdowns', function () {
        return view('user/breakdown/index');
    })->name('user.breakdowns');

Route::get('/admin/suggestions/create', function () {
    return view('admin/suggestions/create');
})->middleware(['auth']);

Route::get('/admin/departments', function () {
    return view('admin/departments/index');
})->middleware(['auth'])->name('departments');

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

Route::get('/user/breakdowns', function () {
    return view('user/breakdown/index');
})->middleware(['auth'])->name('breakdown');


Route::get('/admin/types', function () {
    return view('admin/types/index');
})->middleware(['auth'])->name('types');

Route::get('/admin/types/create', function () {
    return view('admin/types/create');
})->middleware(['auth'])->name('types');


require __DIR__.'/auth.php';
    Route::get('/user/questions', function () {
        return view('user/questions/index');
    })->name('user.questions');

    Route::get('/user/suggestions/list', function () {
        return view('user/suggestions/list');
    })->middleware(['auth'])->name('suggestions');
});


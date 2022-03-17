<?php

use App\Http\Controllers\BreakdownController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\QuestionController;

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

        Route::get('/admin/users/create', [UserController::class, 'index'])->name('admin.users.create');

        Route::get('/admin/users/edit', function () {
            return view('admin/users/edit');
        })->name('admin.users.edit');

        ///////////////////////////////////////////////////

        //Route::get('/admin/devices', function () {
        //    return view('admin/devices/index');
        //})->name('admin.devices');

        Route::get('/admin/devices', [DeviceController::class, 'index'])->name('admin.devices.index');

        Route::get('/admin/devices/create', function () {
            return view('admin/devices/create');
        })->name('admin.devices.create');

        ///////////////////////////////////////////////////

        Route::get('/admin/suggestions/create', function () {
            return view('admin/suggestions/create');
        })->name('admin.suggestions.create');

        Route::get('/admin/suggestions/view/{id}', [SuggestionController::class, 'show'])->name('admin.suggestions.view');

        Route::get('/admin/suggestions', [SuggestionController::class, 'index'])->name('admin.suggestions.index');
        Route::delete('/admin/suggestions/{id}', [SuggestionController::class, 'destroy'])->name('admin.suggestions.delete');
        Route::get('/admin/suggestions/edit/{id}', [SuggestionController::class, 'edit'])->name('admin.suggestions.edit');
      
        Route::get('/admin/suggestions/edit', function () {
            return view('admin/suggestions/edit');
        })->name('admin.suggestions.edit');

        ///////////////////////////////////////////////////


        Route::get('/admin/breakdowns',[BreakdownController::class,"index"])
            ->name('admin.breakdowns');

        Route::get('/admin/breakdowns/create', function () {
            return view('admin/breakdowns/create');
        })->name('admin.breakdowns.create');

        Route::get('/admin/breakdowns/edit', function () {
            return view('admin/breakdowns/edit');
        })->name('admin.breakdowns.edit');

        Route::get('/admin/breakdowns/view/{id}',
            [BreakdownController::class,"show"]);

        ///////////////////////////////////////////////////

        Route::get('/admin/questions' , [QuestionController::class, "index"])->name('admin.questions');

        Route::get('/admin/questions/create', function () {
            return view('admin/questions/create');
        })->name('admin.questions.create');

        Route::get('/admin/questions/view', function () {
            return view('admin/questions/view');
        })->name('admin.questions.view');

        Route::get('/admin/questions/edit', function () {
            return view('admin/questions/edit');
        })->name('admin.questions.edit');

        ////////////////////////////////////////////////////

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

        Route::get('/admin/types/edit', function () {
            return view('admin/types/edit');
        })->name('user.types.edit');
        ///////////////////////////////////////////////////

        Route::get('/admin/questions/create', function () {
            return view('admin/questions/create');
        })->name('admin.questions.create');

    });


    // USER

    Route::get('/user/dashboard', function () {
        return view('user/dashboard');
    })->name('user.dashboard');

    ///////////////////////////////////////////////////

    Route::get('/user/breakdowns', function () {
        return view('user/breakdown/index');
    })->name('user.breakdowns');

    Route::get('/user/breakdowns/create', function () {
        return view('user/breakdowns/create');
    })->name('user.breakdowns.create');

    Route::get('/user/breakdowns/list',[BreakdownController::class,"index"])
        ->name('user.breakdowns.list');

    ///////////////////////////////////////////////////

    Route::get('/user/questions', function () {
        return view('user/questions/index');
    })->name('user.questions');

    Route::get('/user/questions/create', function () {
        return view('user/questions/create');
    })->name('user.questions.create');

    Route::get('/user/questions/list', [QuestionController::class, 'index'])->name('user.questions.list');


    ///////////////////////////////////////////////////

    Route::get('/user/suggestions', function () {
        return view('user/suggestions/index');
    })->name('user.suggestions');

    Route::get('/user/suggestions/create', function () {
        return view('user/suggestions/create');
    })->name('user.suggestions.create');

    Route::get('/user/suggestions/list', [SuggestionController::class, 'index'])->name('user.suggestions.index');
    
    Route::get('/user/suggestions/edit/{id}', [SuggestionController::class, 'edit'])->name('user.suggestions.edit');


    Route::delete('/user/suggestions/list/{id}', [SuggestionController::class, 'destroy'])->name('user.suggestions.delete');


});

require __DIR__ . '/auth.php';

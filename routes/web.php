<?php

use App\Http\Controllers\BreakdownController;
use App\Http\Controllers\OauthController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\HomePage;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ZoneController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\Auth\PasswordResetLinkController;


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

/*O-AUTH routes*/

Route::get('/auth/{provider}/redirect',[OauthController::class, 'redirectProvider']);

Route::get('/auth/{provider}/callback',[OauthController::class, 'authUserOauth']);


Route::get('/', [HomePage::class, 'index'])->name('homepage.index');

Route::get('/guides', [GuideController::class, 'listPublic'])->name('guide.index');
Route::get('/guides/{guide}', [GuideController::class, 'show'])->name('guide.show');


Route::middleware(['auth'])->group(function () {

    Route::middleware(['admin'])->group(function () {

        // ADMIN

        Route::get('/admin/dashboard', [HomePage::class, 'index'])->name('admin.dashboard');

        ///////////////////////////////////////////////////

        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');

        Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');

        Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');

        Route::get('/admin/profile/', [UserController::class, 'show'])->name('admin.profile.index');

        Route::put('/admin/profile/{id}', [UserController::class, 'update'])->name('admin.profile.update');

        Route::put('/admin/users/edit/{id}', [UserController::class, 'update'])->name('admin.devices.update');

        Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.users.store');

        Route::delete('/admin/users/{id}', [UserController::class, "destroy"])->name('admin.users.delete');

        Route::post('/admin/profile/reset', [PasswordResetLinkController::class, 'store'])->name('password.email');


        ///////////////////////////////////////////////////

        //Route::get('/admin/devices', function () {
        //    return view('admin/devices/index');
        //})->name('admin.devices');

        Route::get('/admin/devices', [DeviceController::class, 'index'])->name('admin.devices.index');

        Route::get('/admin/devices/create', [DeviceController::class, 'create'])->name('admin.devices.create');

        Route::post('/admin/devices/create', [DeviceController::class, 'store'])->name('admin.devices.store');

        Route::delete('/admin/devices/{id}', [DeviceController::class, 'destroy'])->name('admin.devices.delete');

        Route::get('/admin/devices/history/{id}', [DeviceController::class, 'history'])->name('admin.devices.history');

        Route::get('/admin/devices/view/{id}', [DeviceController::class, 'show'])->name('admin.devices.view');

        Route::put('/admin/devices/edit/{id}', [DeviceController::class, 'update'])->name('admin.devices.update');

        Route::get('/admin/devices/edit/{id}', [DeviceController::class, 'edit'])->name('admin.devices.edit');

        ///////////////////////////////////////////////////
        Route::post('/admin/suggestions/store', [SuggestionController::class, 'store'])->name('admin.suggestions.store');

        Route::get('/admin/suggestions/create/', [SuggestionController::class, 'create'])->name('admin.suggestions.create');

        Route::get('/admin/suggestions/view/{id}', [SuggestionController::class, 'show'])->name('admin.suggestions.view');

        Route::get('/admin/suggestions', [SuggestionController::class, 'index'])->name('admin.suggestions.index');

        Route::delete('/admin/suggestions/{id}', [SuggestionController::class, 'destroy'])->name('admin.suggestions.delete');

        Route::get('/admin/suggestions/edit/{id}', [SuggestionController::class, 'edit'])->name('admin.suggestions.edit');

        Route::put('/admin/suggestions/update/{id}', [SuggestionController::class, 'update'])->name('admin.suggestions.update');

        ///////////////////////////////////////////////////


        Route::get('/admin/breakdowns', [BreakdownController::class, "index"])->name('admin.breakdowns');

        Route::get('/admin/breakdowns/create',[BreakdownController::class, "create"]);

        Route::post('/admin/breakdowns/create', [BreakdownController::class, "store"]);

        Route::get('/admin/breakdowns/edit/{id}',[BreakdownController::class, "edit"]);

        Route::put('/admin/breakdowns/edit/{id}',[BreakdownController::class, "update"]);

        Route::get('/admin/breakdowns/view/{id}',[BreakdownController::class, "show"]);

        Route::delete('/admin/breakdowns/{id}',[BreakdownController::class, "destroy"]);

        ///////////////////////////////////////////////////

        Route::get('/admin/questions', [QuestionController::class, "index"])->name('admin.questions.index');

        Route::delete('/admin/questions/{id}', [QuestionController::class, "destroy"])->name('admin.questions.delete');

        Route::get('/admin/questions/create', [QuestionController::class, "create"])->name('admin.questions.create');

        Route::get('/admin/questions/view/{id}', [QuestionController::class, 'show'])->name('admin.questions.view');

        Route::post('/admin/questions/create', [QuestionController::class, "store"])->name('admin.questions.store');

        Route::get('/admin/questions/edit/{id}', [QuestionController::class, "edit"])->name('admin.questions.edit');

        Route::put('/admin/questions/update/{id}', [QuestionController::class, "update"])->name('admin.questions.update');


        ////////////////////////////////////////////////////

        Route::get('/admin/departments', [DepartamentController::class, 'index'])
            ->name('admin.departments.index');

        Route::get('/admin/departments/create', [DepartamentController::class, "create"])
            ->name('admin.departments.create');

        Route::get('/admin/departments/history/{id}', [DepartamentController::class, "history"])
            ->name('admin.departments.history');

        Route::get('/admin/departments/view/{id}', [DepartamentController::class, "show"])
            ->name('admin.departments.view');

        Route::get('/admin/departments/view-question/{id}', [DepartamentController::class, "showquestion"])
        ->name('admin.departments.view-question');

        Route::get('/admin/departments/view-suggestion/{id}', [DepartamentController::class, "showsuggestion"])
        ->name('admin.departments.view-suggestion');

        Route::post('/admin/departments/create', [DepartamentController::class, "store"])
            ->name('admin.departments.store');

        Route::get('/admin/departments/edit/{id}', [DepartamentController::class, "edit"])
            ->name('admin.departments.edit');

        Route::put('/admin/departments/edit/{id}', [DepartamentController::class, "update"])
            ->name('admin.departments.update');

        Route::delete('/admin/departments/destroy/{id}', [DepartamentController::class, "destroy"])
            ->name('admin.departments.delete');

        ///////////////////////////////////////////////////


         Route::get('/admin/zones', [ZoneController::class, 'index'])
         ->name('admin.zones.index');

         Route::get('/admin/zones/create', [ZoneController::class, "create"])
            ->name('admin.zones.create');

        Route::get('/admin/zones/history/{id}', [ZoneController::class, "history"])
            ->name('admin.zones.history');

        Route::get('/admin/zones/edit/{id}', [ZoneController::class, "edit"])
            ->name('admin.zones.edit');

        Route::post('/admin/zones/create', [ZoneController::class, "store"])
            ->name('admin.zones.store');

        Route::get('/admin/zones/view/{id}', [ZoneController::class, 'showbreakdown'])
        ->name('admin.zones.view');

        Route::delete('/admin/zones/destroy/{id}', [ZoneController::class, "destroy"])
            ->name('admin.zones.delete');

        Route::put('/admin/zones/edit/{id}', [ZoneController::class, "update"])
            ->name('admin.zones.update');

        ///////////////////////////////////////////////////

        Route::get('/admin/types' , [TypeController::class, "index"])->name('admin.types.index');

        Route::get('/admin/types/create', [TypeController::class, 'create'])->name('admin.types.create');

        Route::get('/admin/types/view/{id}', [TypeController::class, 'show'])->name('admin.types.view');

        Route::post('/admin/types/create' , [TypeController::class, "store"])->name('admin.types.store');

        Route::get('/admin/types/edit', function () {
            return view('admin/types/edit');
        })->name('user.types.edit');

        ///////////////////////////////////////////////////

        Route::get('/admin/types/edit/{id}', [TypeController::class, 'edit'])->name('admin.types.edit');

        Route::put('/admin/types/edit/{id}', [TypeController::class, 'update'])->name('admin.types.update');

        Route::delete('/admin/types/{id}', [TypeController::class, "destroy"])->name('admin.types.delete');

        ///////////////////////////////////////////////////

        Route::get('/admin/guides/edit/{guide}', [GuideController::class, 'edit'])->name('admin.guides.edit');

        Route::put('/admin/guides/update', [GuideController::class, 'update'])->name('admin.guides.update');

        Route::get('/admin/guides/create', [GuideController::class, 'create'])->name('admin.guides.create');

        Route::get('/admin/guides/', [GuideController::class, 'index'])->name('admin.guides.index');

        Route::post('/admin/guides/store', [GuideController::class, 'store'])->name('admin.guides.store');

        Route::delete('/admin/guides/destroy/{id}', [GuideController::class, 'destroy'])->name('admin.guides.delete');

        ///////////////////////////////////////////////////
        Route::post('/admin/messages/{id}', [MessageController::class, "store"])
        ->name('admin.messages.store');

        Route::delete('/admin/messages/{id}',[MessageController::class,"destroy"])
        ->name('admin.messages.delete');
    });


    // USER

    Route::get('/user/dashboard', function () {
        return view('user/dashboard');
    })->name('user.dashboard');

    ///////////////////////////////////////////////////

    Route::get('/user/breakdowns/create', [BreakdownController::class,"create"])->name('user.breakdowns.create');

    Route::post('/user/breakdowns/create', [BreakdownController::class,"store"])->name('user.breakdowns.store');

    Route::delete('/user/breakdowns/{id}', [BreakdownController::class, "destroy"])->name('user.breakdowns.destroy');

    Route::get('/user/breakdowns/view/{id}',[BreakdownController::class, "show"])->name('user.breakdowns.show');

    Route::get('/user/breakdowns/list', [BreakdownController::class, "index"])->name('user.breakdowns.list');;

    Route::get('/user/breakdowns/edit/{id}', [BreakdownController::class, "edit"])->name('user.breakdowns.edit');;

    Route::put('/user/breakdowns/edit/{id}', [BreakdownController::class, "update"])->name('user.breakdowns.update');;

    Route::get('user/breakdowns/index', function () {
        return view('/user/breakdowns/index');
    })->name('user.breakdowns.index');

    ///////////////////////////////////////////////////

    Route::get('/user/questions', [QuestionController::class, "index"])->name('user.questions.index');

    Route::get('/user/questions/list', [QuestionController::class, 'index'])->name('user.questions.list');

    Route::put('/user/questions/edit/{id}', [QuestionController::class, "update"])->name('user.questions.update');

    Route::get('/user/questions/edit/{id}', [QuestionController::class, 'edit'])->name('user.questions.edit');

    Route::post('/user/questions/create', [QuestionController::class, "store"])->name('user.questions.store');

    Route::get('/user/questions/create', [QuestionController::class, "create"])->name('user.questions.create');

    Route::delete('/user/questions/{id}', [QuestionController::class, "destroy"])->name('user.questions.destroy');

    Route::get('/user/questions/view/{id}', [QuestionController::class, "show"])->name('user.questions.view');

    Route::get('user/questions/index', function () {
        return view('/user/questions/index');
    })->name('user.questions.index');

    ///////////////////////////////////////////////////

    Route::get('/user/suggestions/create', [SuggestionController::class, 'create'])->name('user.suggestions.create');

    Route::post('/user/suggestions/store', [SuggestionController::class, 'store'])->name('user.suggestions.store');

    Route::get('/user/suggestions/list', [SuggestionController::class, 'index'])->name('user.suggestions.list');

    Route::get('/user/suggestions/edit/{id}', [SuggestionController::class, 'edit'])->name('user.suggestions.edit');

    Route::delete('/user/suggestions/list/{id}', [SuggestionController::class, 'destroy'])->name('user.suggestions.delete');

    Route::put('/user/suggestions/update/{id}', [SuggestionController::class, 'update'])->name('user.suggestions.update');

    Route::get('user/suggestions/index', function () {
        return view('/user/suggestions/index');
    })->name('user.suggestions.index');

    ///////////////////////////////////////////////////
    Route::get('/user/profile/', [UserController::class, 'show'])->name('user.profile.index');

    Route::put('/user/profile/{id}', [UserController::class, 'update'])->name('user.profile.update');

    Route::post('/user/profile/reset', [PasswordResetLinkController::class, 'store'])->name('password.email');


    ///////////////////////////////////////////////////
    Route::post('/user/messages/{id}', [MessageController::class, "store"])
    ->name('user.messages.store');

    Route::delete('/user/messages/{id}',[MessageController::class,"destroy"])
    ->name('user.messages.delete');
});

require __DIR__ . '/auth.php';

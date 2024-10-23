<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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




// Auth::routes();
Auth::routes(['register' => false]);

// Protected Routes (Only accessible if the user is logged in)
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('/');
    Route::get('/home', [DashboardController::class, 'dashboard'])->name('home');
    Route::resource('guardian', GuardianController::class);
    Route::resource('student', StudentController::class);
    Route::resource('user', UserController::class);
    Route::get('/monitor', function () {
        return view('monitor');
    });
});



Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');

    return "All cache cleared!";
});
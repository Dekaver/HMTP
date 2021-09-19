<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\HmtpController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\AlumniController;
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



Route::get('/', [LandingpageController::class, 'hmtp']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth'])->name('dashboard');
    Route::resource('hmtp', HmtpController::class);
    Route::resource('periode', PeriodeController::class);
    Route::resource('alumni', AlumniController::class);
});

require __DIR__.'/auth.php';

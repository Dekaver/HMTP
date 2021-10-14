<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\HmtpController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\PerpustakaanController;
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



Route::middleware(['trackuser'])->group(function (){
    Route::get('/', [LandingpageController::class, 'hmtp'])->name('/');
    Route::post('forms/contact', function (){
        return "success";
    })->name('contact-send');
});

Route::middleware(['auth'])->prefix("admin")->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth'])->name('dashboard');
    Route::resource('hmtp', HmtpController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('Lab', LabController::class);
    Route::resource('Loker', LokerController::class);
    Route::resource('periode', PeriodeController::class);
    Route::resource('alumni', AlumniController::class);
    Route::resource('Perpustakaan', PerpustakaanController::class);
});

require __DIR__.'/auth.php';

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    return '<h1>Storage Linked</h1>';
});

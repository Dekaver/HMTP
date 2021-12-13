<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\HmtpController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KalenderController;
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
    Route::resource('agenda', AgendaController::class);
    Route::resource('alumni', AlumniController::class)->except(["show"]);
    Route::resource('berita', BeritaController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('kalender', KalenderController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('Lab', LabController::class);
    Route::resource('Loker', LokerController::class);
    Route::resource('periode', PeriodeController::class);
    Route::resource('Perpustakaan', PerpustakaanController::class);
});

// Landingpage 
Route::get('/alumni', [LandingpageController::class, 'alumni']);
Route::get('/lowongan-kerja', [LandingpageController::class, 'loker']);
Route::get('berita/{id}/show', [LandingpageController::class, 'berita'])->name("berita.lihat");

Route::get('/kalender-akademik', [LandingpageController::class, 'kalenderAkademik']);
Route::get('/perpustakaan', [LandingpageController::class, 'perpustakaan']);
Route::get('/jadwal-kuliah', [LandingpageController::class, 'jadwalKuliah']);
Route::get('/laboratorium', [LandingpageController::class, 'laboratorium']);
Route::get('/getdata/{id}/buku/', [LandingpageController::class, 'getDataBuku']);
Route::get('buku/{no}/baca', [LandingpageController::class, 'BacaBuku'])->name("buku.detail");
Route::post('perpustakaan/cari', [LandingpageController::class, 'cariBuku'])->name("cari.buku");
Route::get('perpustakaan/{kategori}/kategori', [LandingpageController::class, 'cariKategoriBuku'])->name("kategori.buku");
Route::get('/kontak', function(){
    return view('front.kontak.index');});

// Route::get('/laboratorium', function(){
//     return view('front.laboratorium.index');});
    
// Route::get('/perpustakaan', function(){
//     return view('front.perpustakaan.index');});

require __DIR__.'/auth.php';

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

Route::get('/clear-all-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    echo '<h1>Cache facade value cleared</h1>';
    $exitCode = Artisan::call('optimize');
    echo '<h1>Reoptimized class loader</h1>';
    
    $exitCode = Artisan::call('route:cache');
    echo '<h1>Routes cached</h1>';

    $exitCode = Artisan::call('route:clear');
    echo '<h1>Route cache cleared</h1>';

    $exitCode = Artisan::call('view:clear');
    echo '<h1>View cache cleared</h1>';

    $exitCode = Artisan::call('config:cache');
    echo '<h1>Clear Config cleared</h1>';
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

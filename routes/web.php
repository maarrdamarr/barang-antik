<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\PenawaranController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () { return view('landing'); })->name('landing');

Route::resource('barang', BarangController::class);
Route::resource('berita', BeritaController::class);

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::middleware('can:isPenjual')->group(function(){
        Route::resource('lelang', LelangController::class);
    });

    Route::post('lelang/{lelang}/tawar', [PenawaranController::class,'store'])->name('lelang.tawar');
});

require __DIR__.'/auth.php';

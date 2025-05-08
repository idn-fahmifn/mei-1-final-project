<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// routing area admin
Route::prefix('admin')->middleware(['auth', 'verified','admin'])->group(function(){

    // route dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // semua laporan
    Route::get('semua-laporan', [ResponController::class, 'index'])->name('admin.laporan.index');
    Route::get('laporan/{param}', [ResponController::class, 'detail'])->name('admin.laporan.detail');
    Route::get('respon/{param}', [ResponController::class, 'respon'])->name('admin.respon');
    Route::post('respon/{param}', [ResponController::class, 'store'])->name('respon.store');

});

// routing area user
Route::prefix('user')->middleware(['auth', 'verified'])->group(function(){

    // route dashboard
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard.user');

    // Route untuk laporan
    // Route Get
    Route::get('laporan', [LaporanController::class, 'index'])->name('user.laporan.index');
    Route::get('laporan/create', [LaporanController::class, 'create'])->name('user.laporan.create');
    Route::post('laporan', [LaporanController::class, 'store'])->name('user.laporan.store');
    Route::get('laporan/{param}', [LaporanController::class, 'detail'])->name('user.laporan.detail');
    Route::get('laporan/{param}/edit', [LaporanController::class, 'edit'])->name('user.laporan.edit');
    Route::put('laporan/{param}', [LaporanController::class, 'update'])->name('user.laporan.update');
    Route::delete('laporan/{param}', [LaporanController::class, 'delete'])->name('user.laporan.delete');



});



require __DIR__.'/auth.php';

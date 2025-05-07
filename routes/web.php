<?php

use App\Http\Controllers\ProfileController;
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

});

// routing area user
Route::prefix('user')->middleware(['auth', 'verified'])->group(function(){

    // route dashboard
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard.user');

});



require __DIR__.'/auth.php';

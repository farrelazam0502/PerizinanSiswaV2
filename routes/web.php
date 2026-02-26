<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\PermitController as AdminPermitController;
use App\Http\Controllers\Student\PermitController as StudentPermitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Rute utama setelah login: dipisah berdasarkan role oleh DashboardController
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // Profil akun
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Khusus Siswa
    Route::prefix('student')->name('student.')->middleware(['student'])->group(function() {
        Route::get('/permits', [StudentPermitController::class, 'index'])->name('permits.index');
        Route::get('/permits/create', [StudentPermitController::class, 'create'])->name('permits.create');
        Route::post('/permits', [StudentPermitController::class, 'store'])->name('permits.store');
        Route::delete('/permits/{permit}', [StudentPermitController::class, 'destroy'])->name('permits.destroy');
    });

    // Khusus Admin
    Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function () {
        Route::get('/dashboard', [AdminPermitController::class, 'index'])->name('dashboard');
        Route::patch('/permits/{permit}/status', [AdminPermitController::class, 'updateStatus'])->name('permits.update_status');
    });
});

require __DIR__.'/auth.php';

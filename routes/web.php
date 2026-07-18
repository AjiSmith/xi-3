<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return view('landing');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});

Route::middleware(['auth', 'role:admin,sekretaris'])->group(function () {
    Route::resource('absensi', AbsensiController::class)->only(['index', 'store']);
    Route::get('/absensi/rekap', [App\Http\Controllers\AbsensiController::class, 'rekap'])->name('absensi.rekap');
});

Route::middleware(['auth', 'role:admin,bendahara'])->group(function () {
    Route::resource('kas', KasController::class)->only(['index', 'store']);
});

Route::middleware(['auth', 'role:admin,walikelas'])->group(function () {
    Route::resource('nilai', NilaiController::class)->only(['index', 'store']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('subjects', SubjectController::class)->only(['index', 'store', 'destroy']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

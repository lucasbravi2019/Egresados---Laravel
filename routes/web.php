<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('dashboard');
})->middleware(['auth', 'verified']);

Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::put('/solicitud/{id}/approve', [SolicitudController::class, 'approve'])->middleware(['auth', 'verified'])->name('solicitud.approve');
Route::put('/solicitud/{id}/reject', [SolicitudController::class, 'reject'])->middleware(['auth', 'verified'])->name('solicitud.reject');

Route::get('/career', [CareerController::class, 'showCareers'])->middleware(['auth', 'verified'])->name('career');
Route::get('/career/{id}/edit', [CareerController::class, 'edit'])->middleware(['auth', 'verified'])->name('career.edit');
Route::get('/career/create', [CareerController::class, 'create'])->middleware(['auth', 'verified'])->name('career.create');
Route::post('/career/create', [CareerController::class, 'storeNewCareer'])->middleware(['auth', 'verified'])->name('career.store');
Route::put('/career/{id}', [CareerController::class, 'update'])->middleware(['auth', 'verified'])->name('career.update');
Route::delete('/career/{id}', [CareerController::class, 'destroy'])->middleware(['auth', 'verified'])->name('career.destroy');

Route::get('/email', [EmailController::class, 'showEmails'])->middleware(['auth', 'verified'])->name('email');
Route::get('/email/sent', [EmailController::class, 'seeEmail'])->middleware(['auth', 'verified'])->name('email.sent');
Route::get('/email/create', [EmailController::class, 'create'])->middleware(['auth', 'verified'])->name('email.create');
Route::get('/email/{id}/edit', [EmailController::class, 'edit'])->middleware(['auth', 'verified'])->name('email.edit');
Route::post('/email/create', [EmailController::class, 'storeNewEmail'])->middleware(['auth', 'verified'])->name('email.create');
Route::put('/email/{id}', [EmailController::class, 'update'])->middleware(['auth', 'verified'])->name('email.update');
Route::delete('/email/{id}', [EmailController::class, 'destroy'])->middleware(['auth', 'verified'])->name('email.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

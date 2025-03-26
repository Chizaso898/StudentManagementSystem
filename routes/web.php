<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordSetupController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;  // CRUD User Controller

// Password Setup Routes
Route::middleware('guest')->group(function () {
    Route::get('/set-password', [PasswordSetupController::class, 'showSetPasswordForm'])->name('set.password');
    Route::post('/set-password', [PasswordSetupController::class, 'setPassword']);
});

// Admin Approval Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Admin User Management (CRUD)
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users');
    Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    Route::post('/admin/users/{id}/approve', [AdminUserController::class, 'approveUser'])->name('admin.approve');
});

// Routes for authenticated and approved users only
Route::middleware(['auth', 'checkApproval'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // You can add any other routes here for authenticated users
});

// CRUD for Users (Including Role-based access)
Route::middleware(['auth', 'checkApproval'])->group(function () {
    // View the user profile (CRUD Read)
    Route::get('/user/profile', [UserController::class, 'show'])->name('user.profile');

    // Edit the user profile (CRUD Update)
    Route::get('/user/profile/edit', [UserController::class, 'edit'])->name('user.profile.edit');
    Route::put('/user/profile', [UserController::class, 'update'])->name('user.profile.update');
    
    // Route for deleting the user profile (CRUD Delete)
    Route::delete('/user/profile', [UserController::class, 'destroy'])->name('user.profile.delete');
});

<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CustomerController;

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.users.index');
    Route::get('/customers', [App\Http\Controllers\Admin\CustomerController::class, 'index']);
    Route::resource('users', UsersController::class);
    Route::resource('customer', CustomerController::class);
}); 

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();  

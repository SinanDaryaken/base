<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Panel\AdminController;
use App\Http\Controllers\Admin\Panel\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest:admin'])->as('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.index');
    Route::post('login', [LoginController::class, 'login'])->name('login.login');
});

Route::middleware(['auth.admin:admin'])->as('admin.')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('admins/filtered', [AdminController::class, 'filtered'])->name('admins.filtered');
    Route::resource('admins', AdminController::class)->except('show');
});

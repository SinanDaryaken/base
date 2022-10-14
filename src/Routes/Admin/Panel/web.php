<?php

use App\Http\Controllers\Admin\Panel\AdminController;
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


Route::middleware(['auth.admin:admin'])->as('admin.')->group(function () {
    Route::get('admins/filtered', [AdminController::class, 'filtered'])->name('admins.filtered');
    Route::resource('admins', AdminController::class)->except('show');
});
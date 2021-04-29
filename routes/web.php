<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::group(['middleware' => ['role:admin', 'auth'], 'namespace' => 'Admin', 'as' => 'dashboard.admin.', 'prefix' => '/dashboard/admin'], function () {
    Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::post('users', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
    Route::get('users/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
    Route::get('users/edit/{id}', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{id}/edit', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
});

Route::group(['middleware' => ['role:kader', 'auth'], 'namespace' => 'Kader', 'as' => 'dashboard.kader.', 'prefix' => '/dashboard/kader'], function () {
    Route::get('pregnant', [\App\Http\Controllers\Kader\PregnantController::class, 'index'])->name('pregnant.index');
    Route::post('pregnant', [\App\Http\Controllers\Kader\PregnantController::class, 'store'])->name('pregnant.store');
    Route::get('pregnant/create', [\App\Http\Controllers\Kader\PregnantController::class, 'create'])->name('pregnant.create');
    Route::get('pregnant/edit/{id}', [\App\Http\Controllers\Kader\PregnantController::class, 'edit'])->name('pregnant.edit');
    Route::put('pregnant/{id}/edit', [\App\Http\Controllers\Kader\PregnantController::class, 'update'])->name('pregnant.update');
    Route::get('pregnant/{id}', [\App\Http\Controllers\Kader\PregnantController::class, 'show'])->name('pregnant.show');

    Route::get('pregnant/detail/create/{id}', [\App\Http\Controllers\Kader\DetailPregnantController::class, 'create'])->name('pregnant.detail.create');
    Route::post('pregnant/detail/{id}', [\App\Http\Controllers\Kader\DetailPregnantController::class, 'store'])->name('pregnant.detail.store');
});

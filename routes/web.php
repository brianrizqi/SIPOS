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
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);

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
    Route::get('pregnant/detail/edit/{id}', [\App\Http\Controllers\Kader\DetailPregnantController::class, 'edit'])->name('pregnant.detail.edit');
    Route::put('pregnant/detail/{id}/edit', [\App\Http\Controllers\Kader\DetailPregnantController::class, 'update'])->name('pregnant.detail.update');

    Route::get('pregnant/risk/{id}', [\App\Http\Controllers\Kader\RiskPregnantController::class, 'index'])->name('pregnant.risk.index');
    Route::post('pregnant/risk/{id}', [\App\Http\Controllers\Kader\RiskPregnantController::class, 'store'])->name('pregnant.risk.store');
    Route::get('pregnant/risk/create/{id}', [\App\Http\Controllers\Kader\RiskPregnantController::class, 'create'])->name('pregnant.risk.create');
    Route::get('pregnant/risk/edit/{id}', [\App\Http\Controllers\Kader\RiskPregnantController::class, 'edit'])->name('pregnant.risk.edit');
    Route::put('pregnant/risk/{id}/edit', [\App\Http\Controllers\Kader\RiskPregnantController::class, 'update'])->name('pregnant.risk.update');
});

Route::group(['middleware' => ['role:bidan', 'auth'], 'namespace' => 'Bidan', 'as' => 'dashboard.bidan.', 'prefix' => '/dashboard/bidan'], function () {
    Route::get('pregnant/service', [\App\Http\Controllers\Bidan\ServicePregnantController::class, 'index'])->name('pregnant.service.index');
    Route::post('pregnant/service', [\App\Http\Controllers\Bidan\ServicePregnantController::class, 'store'])->name('pregnant.service.store');
    Route::get('pregnant/service/history', [\App\Http\Controllers\Bidan\ServicePregnantController::class, 'history'])->name('pregnant.service.history');
    Route::get('pregnant/service/history/{date}', [\App\Http\Controllers\Bidan\ServicePregnantController::class, 'detail'])->name('pregnant.service.history.detail');
    Route::get('pregnant/service/create', [\App\Http\Controllers\Bidan\ServicePregnantController::class, 'create'])->name('pregnant.service.create');
    Route::get('pregnant/service/edit/{id}', [\App\Http\Controllers\Bidan\ServicePregnantController::class, 'edit'])->name('pregnant.service.edit');
    Route::put('pregnant/service/{id}/edit', [\App\Http\Controllers\Bidan\ServicePregnantController::class, 'update'])->name('pregnant.service.update');

    Route::get('pregnant', [\App\Http\Controllers\Bidan\PregnantController::class, 'index'])->name('pregnant.index');
    Route::get('pregnant/{id}', [\App\Http\Controllers\Bidan\PregnantController::class, 'show'])->name('pregnant.show');

    Route::get('pregnant/risk/{id}', [\App\Http\Controllers\Bidan\RiskPregnantController::class, 'index'])->name('pregnant.risk.index');
});

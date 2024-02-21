<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'super_admin', 'prefix' => 'sa', 'as' => 'sa.'], function () {
    Route::get('/', [\App\Http\Controllers\Web\Panel\SuperAdmin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', \App\Http\Controllers\Web\Panel\SuperAdmin\UserController::class);
    Route::post('users/list', [\App\Http\Controllers\Web\Panel\SuperAdmin\UserController::class, 'list'])->name('users.list');
    Route::patch('users/{username}/reset-password', [\App\Http\Controllers\Web\Panel\SuperAdmin\UserController::class, 'resetPassword'])->name('users.reset-password');
});

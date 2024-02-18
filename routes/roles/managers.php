<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'manager', 'prefix' => 'manager', 'as' => 'manager.'], function () {
    Route::get('/', [\App\Http\Controllers\Web\Panel\Manager\DashboardController::class, 'index'])->name('dashboard');
});

<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'super_admin', 'prefix' => 'sa', 'as' => 'sa.'], function () {
    Route::get('/', [\App\Http\Controllers\Web\Panel\SuperAdmin\DashboardController::class, 'index'])->name('dashboard');
});

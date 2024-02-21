<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'teacher', 'prefix' => 'teacher', 'as' => 'teacher.'], function () {
    Route::get('/', [\App\Http\Controllers\Web\Panel\Teacher\DashboardController::class, 'index'])->name('dashboard');
});

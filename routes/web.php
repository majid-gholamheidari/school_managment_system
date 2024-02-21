<?php
use Illuminate\Support\Facades\Route;

// Authenticated users
Route::group(['middleware' => 'auth:web', 'prefix' => 'panel', 'as' => 'panel.'], function () {

    Route::get('main-dashboard', [\App\Http\Controllers\Web\Panel\MainController::class, 'redirectToUserDashboard'])->name('main-dashboard');

    // super admins
    include "roles/super_admin.php";


    // managers
    include "roles/managers.php";


    // teachers
    include "roles/teachers.php";


    // sponsors
    include "roles/sponsors.php";


    // students
    include "roles/students.php";
});

// Authentication routes
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('/sign-in', [\App\Http\Controllers\Web\Panel\AuthenticationController::class, 'signIn'])->name('sign-in');
    Route::post('/sign-in', [\App\Http\Controllers\Web\Panel\AuthenticationController::class, 'doSignIn'])->name('do-sign-in');
    Route::get('/forget-password', [\App\Http\Controllers\Web\Panel\AuthenticationController::class, 'forgetPasswordPage'])->name('forget-password');
    Route::post('/logout', [\App\Http\Controllers\Web\Panel\AuthenticationController::class, 'logout'])->name('logout');
});

Route::get('/no-access', [\App\Http\Controllers\Web\Panel\MainController::class, 'noAccess'])->name('no-access-page');
Route::get('/', [\App\Http\Controllers\Web\Panel\MainController::class, 'homePage']);

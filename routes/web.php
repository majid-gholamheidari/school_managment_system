<?php
use Illuminate\Support\Facades\Route;

// Authenticated users
Route::group(['middleware' => 'auth:web', 'prefix' => 'panel', 'as' => 'panel.'], function () {

    // super admins
    include "roles/super_admin.php";


    // managers
    include "roles/managers.php";
});

// Authentication routes
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('/sign-in', [\App\Http\Controllers\Web\Panel\AuthenticationController::class, 'signIn'])->name('sign-in');
});

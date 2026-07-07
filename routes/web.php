<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodLogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileGiziController;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Profil Gizi
    |--------------------------------------------------------------------------
    */

    Route::controller(ProfileGiziController::class)->group(function () {
        Route::get('/profile-gizi', 'index')->name('profile-gizi.index');
        Route::get('/profile-gizi/create', 'create')->name('profile-gizi.create');
        Route::post('/profile-gizi', 'store')->name('profile-gizi.store');
    });

    /*
    |--------------------------------------------------------------------------
    | Food Search (Autocomplete)
    |--------------------------------------------------------------------------
    */

    Route::get('/foods/search', [FoodController::class, 'search'])
        ->name('foods.search');

    /*
    |--------------------------------------------------------------------------
    | Food Log
    |--------------------------------------------------------------------------
    */

    Route::controller(FoodLogController::class)->group(function () {

        // Form tambah makanan
        Route::get('/food-log', 'create')->name('food-log.create');

        // Simpan makanan
        Route::post('/food-log', 'store')->name('food-log.store');

        // Riwayat makanan
        Route::get('/food-log/history', 'index')->name('food-log.index');

        // Edit makanan
        Route::get('/food-log/{foodLog}/edit', 'edit')->name('food-log.edit');

        // Update makanan
        Route::put('/food-log/{foodLog}', 'update')->name('food-log.update');

        // Hapus makanan
        Route::delete('/food-log/{foodLog}', 'destroy')->name('food-log.destroy');
    });
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

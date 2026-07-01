<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
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

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Profile Laravel
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Profil Gizi
    |--------------------------------------------------------------------------
    */

    Route::get('/profile-gizi', [ProfileGiziController::class, 'index'])
        ->name('profile-gizi.index');

    Route::get('/profile-gizi/create', [ProfileGiziController::class, 'create'])
        ->name('profile-gizi.create');

    Route::post('/profile-gizi', [ProfileGiziController::class, 'store'])
        ->name('profile-gizi.store');

    /*
    |--------------------------------------------------------------------------
    | Food Log
    |--------------------------------------------------------------------------
    */

    // Form tambah makanan
    Route::get('/food-log', [FoodLogController::class, 'create'])
        ->name('food-log.create');

    // Simpan makanan
    Route::post('/food-log', [FoodLogController::class, 'store'])
        ->name('food-log.store');

    // Riwayat makanan
    Route::get('/food-log/history', [FoodLogController::class, 'index'])
        ->name('food-log.index');

    // Edit
    Route::get('/food-log/{foodLog}/edit', [FoodLogController::class, 'edit'])
        ->name('food-log.edit');

    // Update
    Route::put('/food-log/{foodLog}', [FoodLogController::class, 'update'])
        ->name('food-log.update');

    // Hapus
    Route::delete('/food-log/{foodLog}', [FoodLogController::class, 'destroy'])
        ->name('food-log.destroy');

});

require __DIR__.'/auth.php';
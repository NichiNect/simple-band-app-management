<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Band\BandController;
use App\Http\Controllers\DashboardController;

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

Auth::routes([
    'reset' => false,
]);

Route::get('/', HomeController::class)->name('home');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('bands')->group(function() {
        Route::get('/create', [BandController::class, 'create'])->name('bands.create');
        Route::post('/create', [BandController::class, 'store'])->name('bands.store');
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Band\BandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Band\AlbumController;

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
        Route::get('/table', [BandController::class, 'index'])->name('bands.index');
        Route::get('/{band:slug}/edit', [BandController::class, 'edit'])->name('bands.edit');
        Route::put('{band:slug}/edit', [BandController::class, 'update'])->name('bands.update');
        Route::delete('{band:slug}/delete', [BandController::class, 'destroy'])->name('bands.destroy');
    });
    
    Route::prefix('albums')->group(function() {
        Route::get('/create', [AlbumController::class, 'create'])->name('albums.create');
        Route::post('/create', [AlbumController::class, 'store'])->name('albums.store');
        Route::get('/table', [AlbumController::class, 'index'])->name('albums.index');
        Route::get('/{album:slug}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
        Route::put('/{album:slug}/edit', [AlbumController::class, 'update'])->name('albums.update');
    });
});

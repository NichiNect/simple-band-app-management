<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Band\{AlbumController, BandController, GenreController, LyricController};

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
        Route::delete('{band:slug}/delete', [AlbumController::class, 'destroy'])->name('albums.destroy');
        Route::get('/get-album-by-{band}', [AlbumController::class, 'getAlbumsByBandID']);
    });

    Route::prefix('genres')->group(function() {
        Route::get('/create', [GenreController::class, 'create'])->name('genres.create');
        Route::post('/create', [GenreController::class, 'store'])->name('genres.store');
        Route::get('table', [GenreController::class, 'index'])->name('genres.index');
        Route::get('/{genre:slug}/edit', [GenreController::class, 'edit'])->name('genres.edit');
        Route::put('/{genre:slug}/edit', [GenreController::class, 'update'])->name('genres.update');
        Route::delete('/{genre:slug}/delete', [GenreController::class, 'destroy'])->name('genres.destroy');
    });

    Route::prefix('lyrics')->group(function() {
        Route::get('/create', [LyricController::class, 'create'])->name('lyrics.create');
        Route::post('/create', [LyricController::class, 'store'])->name('lyrics.store');
        Route::get('table', [LyricController::class, 'index'])->name('lyrics.index');
    });
});

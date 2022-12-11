<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\ExploreController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ExploreController::class, 'index'])->name('explore.index');

Route::get('anime/{id}', [AnimeController::class, 'show'])->name('anime.show');
Route::get('watch/{id}/{episode}', [AnimeController::class, 'watch'])->name('anime.watch');
Route::get('search', [AnimeController::class, 'search'])->name('anime.search');

Route::get('{type}/all', [AnimeController::class, 'viewAll'])->name('anime.view-all');

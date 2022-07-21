<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
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

Route::get('genres', [GenreController::class, 'index']);
Route::get('show/genre/{genre:id}', [GenreController::class, 'show']);
Route::get('create/genre', [GenreController::class, 'create']);
Route::post('store/genre', [GenreController::class, 'store']);
Route::get('edit/genre', [GenreController::class, 'edit']);
Route::post('edit/genre/{genre:id}', [GenreController::class, 'update']);
Route::get('delete/genre', [GenreController::class, 'destroy']);

Route::get('films', [FilmController::class, 'index']);
Route::get('show/film/{film:id}', [FilmController::class, 'show']);
Route::get('create/film', [FilmController::class, 'create']);
Route::post('store/film', [FilmController::class, 'store']);
Route::get('edit/film', [FilmController::class, 'edit']);
Route::post('edit/film/{film:id}', [FilmController::class, 'update']);
Route::get('delete/film', [FilmController::class, 'destroy']);

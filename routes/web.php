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
Route::controller(GenreController::class)->group(function (){
    Route::get('genres', 'index');
    Route::get('show/genre/{genre:id}', 'show');
    Route::get('create/genre', 'create');
    Route::post('store/genre', 'store');
    Route::get('edit/genre', 'edit');
    Route::post('edit/genre/{genre:id}', 'update');
    Route::get('delete/genre', 'destroy');

});

Route::controller(FilmController::class)->group(function (){
    Route::get('films', 'index');
    Route::get('show/film/{film:id}', 'show');
    Route::get('create/film', 'create');
    Route::post('store/film',  'store');
    Route::get('edit/film',  'edit');
    Route::post('edit/film/{film:id}',  'update');
    Route::get('delete/film',  'destroy');
});


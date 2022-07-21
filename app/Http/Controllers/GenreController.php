<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    /**
     * Display a listing of genres.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GenreResource::collection(Genre::all());
    }

    /**
     * Show the form for creating a new genre.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.forms.genre-form-create');
    }

    /**
     * Store a newly created genre in storage.
     *
     * @param  \App\Http\Requests\StoreGenreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGenreRequest $request)
    {
        $attributes = $request->validated();

        Genre::create($attributes);

        return back();
    }

    /**
     * Display the genre by id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new GenreResource(Genre::find($id));
    }

    /**
     * Show the form for editing the genre.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return view('components.forms.genre-form-create', [
           'genre' => $genre->id
        ]);
    }

    /**
     * Update the genre in storage.
     *
     * @param  \App\Http\Requests\UpdateGenreRequest  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $attributes = $request->validated();

        DB::table('genres')
            ->where('id', $genre->id)
            ->update($attributes);

        return redirect('/');
    }

    /**
     * Remove the specified genre from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        DB::table('genres')
            ->where('id', $genre->id)
            ->delete();

        return back();
    }
}

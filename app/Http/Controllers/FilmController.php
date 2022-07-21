<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    /**
     * Display a listing of films.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FilmResource::collection(Film::paginate());
    }

    /**
     * Show the form for creating a new film.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.forms.film-form-create', [
            'genres' => Genre::all()
        ]);
    }

    /**
     * Store a newly created film in storage.
     *
     * @param  \App\Http\Requests\StoreFilmRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFilmRequest $request)
    {
        $attributes = $request->validated();

        if (request()->input('status') !== null) {
            $attributes['status'] = true;
        } else {
            $attributes['status'] = false;
        }

        foreach (request()->input('genres') as $genre) {
            $genres = Genre::all()->where('name', $genre);
        }

        if (request()->file('image') !== null) {
            $attributes['image'] = request()->file('image')->store('image');
        } else {
            $attributes['image'] = 'http://via.placeholder.com/640x360';
        }

        $filmId = DB::table('films')->insertGetId($attributes);

        foreach ($genres as $genre) {
            DB::table('film_genre')->insert([
                'film_id' => $filmId,
                'genre_id' => $genre->id
            ]);
        }

        return back();
    }

    /**
     * Display the film by id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new FilmResource(Film::find($id));
    }

    /**
     * Show the form for editing the film.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        return view('components.forms.film-form-edit', [
           'film' => $film->id
        ]);
    }

    /**
     * Update the film in storage.
     *
     * @param  \App\Http\Requests\UpdateFilmRequest  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFilmRequest $request, Film $film)
    {
        $attributes = $request->validated();

        DB::table('films')
            ->where('id', $film->id)
            ->update($attributes);

        return redirect('/');
    }

    /**
     * Remove the film from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        DB::table('films')
            ->where('id', $film->id)
            ->delete();

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use App\Http\Resources\FilmResource;
use App\Models\Film;
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
        return view('components.forms.film-form-create');
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

//        return view('test', [
//            'film' => request()->boolean()
//        ]);

        if (request()->file('image') !== null) {
            $attributes['image'] = request()->file('image')->store('image');
        } else {
            $attributes['image'] = 'http://via.placeholder.com/640x360';
        }

        Film::create($attributes);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

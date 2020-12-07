<?php

namespace App\Http\Controllers\Band;

use App\Models\Genre;
use App\Http\Requests\Band\GenreRequest;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::latest()->paginate(10);

        return view('genres.table', [
            'genres' => $genres,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Band\GenreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreRequest $request)
    {
        Genre::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
        ]);
        
        session()->flash('success', 'Genre was Created');
        return redirect()->route('genres.index');
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return view('genres.edit', [
            'genre' => $genre
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Band\GenreRequests  $request
     * @param  \App\Models\Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function update(GenreRequest $request, Genre $genre)
    {
        $genre->update([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
        ]);
        
        session()->flash('success', 'Genre was Updated');
        return redirect()->route('genres.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
    }
}

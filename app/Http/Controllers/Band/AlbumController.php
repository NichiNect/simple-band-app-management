<?php

namespace App\Http\Controllers\Band;

use App\Models\Band;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::latest()->paginate(10);
        return view('albums.table', [
            'title' => 'Albums',
            'albums' => $albums,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bands = Band::get();
        return view('albums.create', [
            'title' => 'New Album',
            'bands' => $bands,
            'album' => new Album,
            'btnSubmit' => 'Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'band' => 'required|unique:albums',
            'name' => 'required',
            'year' => 'required',
        ]);

        $album = Album::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'band_id' => $request->band,
            'year' => $request->year,
        ]);

        session()->flash('success', 'Album was Created');
        return redirect()->route('albums.index');
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
     * @param  \App\Models\Album $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        $bands = Band::get();
        return view('albums.edit', [
            'title' => 'Edit album: ' . $album->name,
            'album' => $album,
            'bands' => $bands,
            'btnSubmit' => 'Update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'band' => 'required|unique:albums,name,' . $album->id,
            'name' => 'required',
            'year' => 'required',
        ]);

        $album->update([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'band_id' => $request->band,
            'year' => $request->year,
        ]);

        session()->flash('success', 'Album was Updated');
        return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();
    }
}

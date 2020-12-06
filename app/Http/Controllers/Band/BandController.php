<?php

namespace App\Http\Controllers\Band;

use App\Models\Band;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands = Band::latest()->paginate(10);
        return view('bands.table', compact('bands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::get();
        return view('bands.create', compact('genres'));
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
            'name' => 'required',
            'thumbnail' => request('thumbnail') ? 'image|mimes:jpeg,jpg,png,svg' : '',
            'genres' => 'required|array',
        ]);

        // if ($request->hasFile('thumbnail')) {
        //     $photo = $request->file('thumbnail');
        //     $image_extension = $photo->extension();
        //     $image_name = Str::slug($request->name) . '-' . time() . "." . $image_extension;
        //     $photo->storeAs('/images/band/', $image_name, 'public');
        // }
        
        $band = Band::create([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'thumbnail' => request('thumbnail') ? request()->file('thumbnail')->store('images/band') : null,
        ]);

        $band->genres()->sync(request('genres'));

        session()->flash('success', 'Band was created');
        return redirect()->route('bands.index');
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
     * @param  eloquent  \App\Models\Band $band
     * @return \Illuminate\Http\Response
     */
    public function edit(Band $band)
    {
        $genres = Genre::get();

        return view('bands.edit', [
            'band' => $band,
            'genres' => $genres
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Band $band
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Band $band)
    {
        $request->validate([
            'name' => 'required|unique:bands,name,' . $band->id,
            'thumbnail' => request('thumbnail') ? 'image|mimes:jpeg,jpg,png,svg' : '',
            'genres' => 'required|array',
        ]);

        if(request('thumbnail')) {
            Storage::delete($band->thumbnail);
            $thumbnail = request()->file('thumbnail')->store('images/band');
        } else if($band->thumbnail) {
            $thumbnail = $band->thumbnail;
        } else {
            $thumbnail = null;
        }
        
        $band->update([
            'name' => $request->name,
            'slug' => \Str::slug($request->name),
            'thumbnail' => $thumbnail
        ]);

        $band->genres()->sync(request('genres'));

        session()->flash('success', 'Band was updated');
        return redirect()->route('bands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Band;

use App\Models\Band;
use App\Models\Genre;
use App\Http\Controllers\Controller;
use App\Http\Requests\Band\BandRequest;
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
        if(request()->expectsJson()) {
            return Band::latest()->get(['id', 'name']);
        }
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
        return view('bands.create', [
            'genres' => $genres,
            'band' => new Band,
            'btnSubmit' => 'Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Band\BandRequest;
     * @return \Illuminate\Http\Response
     */
    public function store(BandRequest $request)
    {
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
     * @param  \App\Models\Band $band
     * @return \Illuminate\Http\Response
     */
    public function edit(Band $band)
    {
        $genres = Genre::get();

        return view('bands.edit', [
            'band' => $band,
            'genres' => $genres,
            'btnSubmit' => 'Update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Band\BandRequest;
     * @param \App\Models\Band $band
     * @return \Illuminate\Http\Response
     */
    public function update(BandRequest $request, Band $band)
    {
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
     * @param \App\Models\Band $band
     * @return \Illuminate\Http\Response
     */
    public function destroy(Band $band)
    {
        Storage::delete($band->thumbnail);
        $band->genres()->detach();
        $band->albums()->delete();
        $band->delete();

        session()->flash('success', 'Band was updated');
    }
}

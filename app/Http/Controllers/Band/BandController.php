<?php

namespace App\Http\Controllers\Band;

use App\Models\Band;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'thumbnail' => request()->file('thumbnail')->store('images/band'),
        ]);

        $band->genres()->sync(request('genres'));

        session()->flash('success', 'Band was created');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

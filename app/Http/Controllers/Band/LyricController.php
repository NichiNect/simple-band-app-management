<?php

namespace App\Http\Controllers\Band;

use App\Models\Band;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LyricController extends Controller
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
        return view('lyrics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'album' => 'required',
            'band' => 'required',
            'body' => 'required',
            'title' => 'required',
        ]);

        $band = Band::findOrFail(request('band'));

        $band->lyrics()->create([
            'title' => request('title'),            
            'slug' => \Str::slug(request('title')),
            'body' => request('body'),            
            'album_id' => request('album'),
        ]);

        return response()->json([
            'message' => 'The lyrics was created into band: ' . $band->name
        ]);
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

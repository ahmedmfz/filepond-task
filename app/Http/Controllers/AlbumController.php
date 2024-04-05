<?php

namespace App\Http\Controllers;

use App\Models\Album;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::select('id','name')->latest()->get();
        return view('admin.albums.index', compact('albums'));
    }

    public function store(Request $request)
    {
        Album::create([
            'name' => $request->name,
        ]);
        // foreach ($request->images as $image) {
        //     $album->addMedia($image)->usingName(($album->name))->toMediaCollection();
        // }
        session()->flash('success', 'The data has been saved successfully');
        return redirect()->route('album.index');
    }

    public function addPic(Album $album){
       return view('admin.albums.add_pic', compact('album'));
    }
    
    public function show(Album $album)
    {
        $albumName = $album->name;
        $media = $album->getMedia('images');

        return view('admin.albums.show', compact('albumName', 'media'));
    }


    public function create(Album $album)
    {
        return view('admin.albums.create', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('admin.albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        // update images for album
        $album->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {   
        // check album has image 
        // if has images  => 1- delete images or 2- update relations
        // if has not image => delete 
        $album->delete();
    }
}

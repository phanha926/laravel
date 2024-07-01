<?php

namespace App\Http\Controllers;

use App\Models\music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $musicie = music::all();
        return view('music.index')->with('musicie', $musicie);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('music.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'location' => 'required|max:255',
        ]);
        // Create The Category
        $tbl_music = new music();
        $tbl_music->title = $request->title;
        $tbl_music->description = $request->description;
        $tbl_music->location = $request->location;
        $tbl_music->save();
        Session::flash('music_create','music is created.');
        return redirect('/music/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $musicie = Music::find($id);
        return view('music.show')->with('music',$musicie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $musicie = Music::find($id);
        return view('music.edit')->with('music', $musicie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
			'title' => 'required|max:20|min:3',
            'description' => 'required|max:20|min:3',
            'location' => 'required|max:20|min:3'
		]);
		if ($validator->fails()) {
			return redirect('music/' . $id . '/edit')
            ->withInput()
            ->withErrors($validator);
		}
		// Create The Category
		$tbl_music = Music::find($id);
		$tbl_music->title = $request->Input('title');
        $tbl_music->description = $request->Input('description');
        $tbl_music->location = $request->Input('location');
		$tbl_music->save();
		Session::flash('music_update','music is updated.');
		return redirect('music/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tbl_music = music::find($id);
        $tbl_music->delete();
        Session::flash('music_delete','Music is deleted.');
        return redirect('music');
    }
}

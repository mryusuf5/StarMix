<?php

namespace App\Http\Controllers;

use App\Models\PlaylistSongs;
use Illuminate\Http\Request;

class PlaylistSongsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PlaylistSongs::create([
            "song_id" => $request->songId,
            "playlist_id" => $request->playlistId
        ]);

        return redirect()->route("home")->with("success", "Song has been added to your playlist");
    }

    /**
     * Display the specified resource.
     */
    public function show(PlaylistSongs $playlistSongs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlaylistSongs $playlistSongs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlaylistSongs $playlistSongs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlaylistSongs $playlistSongs)
    {
        //
    }
}

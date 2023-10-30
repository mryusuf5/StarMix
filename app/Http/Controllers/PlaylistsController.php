<?php

namespace App\Http\Controllers;

use App\Models\Playlists;
use App\Models\PlaylistSongs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlaylistsController extends Controller
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
        $request->validate([
            "name" => "required"
        ]);

        $playlists = Playlists::where("name", $request->name)
            ->where("user_id", Session::get("user")->id)
            ->first();

        if($playlists)
        {
            return redirect()->route("home")->with("error", "Playlist with the same name already exists");
        }

        Playlists::create([
            "name" => $request->name,
            "user_id" => Session::get("user")->id
        ]);

        return redirect()->route("home")->with("success", "Playlist has been added");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $playlist = Playlists::where("id", $id)
            ->with("user")
            ->first();

        $playlists = Playlists::all();

        $songs = PlaylistSongs::where("playlist_id", $id)
            ->with("songs")
            ->get();

        return view("playlists.show", compact(
            'playlists',
            'playlist',
            'songs'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlists $playlists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlists $playlists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlists $playlists)
    {
        //
    }
}

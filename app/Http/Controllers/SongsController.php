<?php

namespace App\Http\Controllers;

use App\Models\Playlists;
use App\Models\Songs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlists = Playlists::where("user_id", Session::get("user")->id)->get();
        $songs = Songs::where("user_id", Session::get("user")->id)->get();

        return view("welcome", compact(
            "songs",
            "playlists"
        ));
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
            "title" => "required",
            "artist" => "required"
        ]);

        if(!$request->file("song"))
        {
            return redirect()->route("home")->with("error", "You need to select a song");
        }

        $songName = "song-" . time() . '.' . $request->file("song")->getClientOriginalExtension();
        $imageName = "";

        if($request->file("image"))
        {
            $imageName = "cover-" . time() . '.' . $request->file("image")->getClientOriginalExtension();
            $request->file("image")->move("img/songCovers/", $imageName);
        }

        $request->file("song")->move("songs/", $songName);

        Songs::create([
            "artist" => $request->artist,
            "title" => $request->title,
            "description" => $request->description,
            "song" => $songName,
            "image" => $imageName,
            "user_id" => Session::get("user")->id
        ]);

        return redirect()->route("home")->with("success", "Song added");
    }

    /**
     * Display the specified resource.
     */
    public function show(Songs $songs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Songs $songs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Songs $songs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Songs $songs)
    {
        //
    }
}

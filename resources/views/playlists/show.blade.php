@component("components.header", ["playlists" => $playlists])
    <div class="d-flex justify-content-between">
        <div class="d-flex flex-column">
            <h1>{{$playlist->name}}</h1>
            <p>Created by: {{$playlist->user->username}}</p>
        </div>

        <h1>
            <a href="#" id="playlistLink" data-playlist-link="{{route("playlists.show", $playlist->id)}}"
               class="text-white">Share playlist</a>
        </h1>
    </div>
    <hr>

    <div id="songsContainer" class="d-flex flex-column gap-2 overflow-auto" style="height: 80vh !important;">
        @foreach($songs as $song)
            <div class="border border-warning rounded-4 d-flex flex-column gap-2 p-2">
                <x-song>
                    <x-slot name="title">{{$song->songs[0]->title}}</x-slot>
                    <x-slot name="song">{{$song->songs[0]->song}}</x-slot>
                    <x-slot name="artist">{{$song->songs[0]->artist}}</x-slot>
                    <x-slot name="date">{{$song->songs[0]->created_at}}</x-slot>
                    <x-slot name="image">{{$song->songs[0]->image}}</x-slot>
                </x-song>
            </div>
        @endforeach
    </div>

    <div id="visualizerContainer" class="d-none">
        <x-visualizer />
    </div>

    <x-player />
@endcomponent
<x-footer />

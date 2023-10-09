@component("components.header", ["playlists" => $playlists])
    <h3>My songs</h3>
    <hr>
    <div id="songsContainer" class="d-flex flex-column gap-2 overflow-auto" style="height: 80vh !important;">
        @foreach($songs as $song)
            <div class="border border-warning rounded-4 d-flex flex-column gap-2 p-2">
                <x-song>
                    <x-slot name="title">{{$song->title}}</x-slot>
                    <x-slot name="song">{{$song->song}}</x-slot>
                    <x-slot name="artist">{{$song->artist}}</x-slot>
                    <x-slot name="date">{{$song->created_at}}</x-slot>
                    <x-slot name="image">{{$song->image}}</x-slot>
                    <x-slot name="songId">{{$song->id}}</x-slot>
                </x-song>
            </div>

            <div class="modal fade" id="addSongToPlaylist-{{$song->id}}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body d-flex flex-column gap-2">
                            @foreach($playlists as $playlist)
                                <form action="{{route("playlistSongs.store")}}"
                                      method="POST" class="border border-warning p-2 rounded">
                                    @csrf
                                    @method("POST")
                                    <input type="text" hidden value="{{$song->id}}" name="songId">
                                    <input type="text" hidden value="{{$playlist->id}}" name="playlistId">
                                    <button type="submit">{{$playlist->name}}</button>
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div id="visualizerContainer" class="d-none">
        <x-visualizer />
    </div>

    <x-player />

@endcomponent
<x-add-song-modal>
    <x-slot name="action">
        {{route("song.store")}}
    </x-slot>
</x-add-song-modal>

<x-add-playlist-modal>
    <x-slot name="action">
        {{route("playlists.store")}}
    </x-slot>
</x-add-playlist-modal>
<x-footer />

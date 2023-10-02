<x-header>

    <div id="songsContainer" class="d-flex flex-column gap-2">
        @foreach($songs as $song)
            <div class="border border-warning rounded-4 d-flex flex-column gap-2 p-2">
                <x-song>
                    <x-slot name="title">{{$song->title}}</x-slot>
                    <x-slot name="song">{{$song->song}}</x-slot>
                    <x-slot name="artist">{{$song->artist}}</x-slot>
                    <x-slot name="date">{{$song->created_at}}</x-slot>
                    <x-slot name="image">{{$song->image}}</x-slot>
                </x-song>
            </div>
        @endforeach
    </div>

    <div id="visualizerContainer" class="d-none">
        <x-visualizer />
    </div>

    <x-player />

</x-header>
<x-add-song-modal>
    <x-slot name="action">
        {{route("song.store")}}
    </x-slot>
</x-add-song-modal>

<x-footer />


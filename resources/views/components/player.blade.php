@section("styles")
<style>
    .duration {
        display: flex;
        width: 25rem;
        height: .5rem;
        -webkit-appearance: none;
        background: linear-gradient(180deg,#8f813d,#706048,#7A702A);
        border-radius: 1.5rem;
        box-shadow: 0 3px 2px -1px rgba(255,255,255,0.25) inset, 0 0 10px 0 rgba(0,0,0,0.5), 0 0 10px 2px rgba(0,0,0,0.25), 0 8px 4px -3px rgba(0,0,0,0.15);
    }
    .duration::-webkit-slider-runnable-track, .duration::-moz-range-track {
        background: #222;
        width: 24rem;
        height: .25rem;
        border-radius: 3rem;
        cursor: pointer;
        box-shadow: 0 1px 1px 0 rgba(255,255,255,0.25), 0 2px 2px 0 rgba(255,255,255,0.15);
        border: 1px solid rgba(0,0,0,0.25);
    }
    .duration::-webkit-slider-runnable-track {
        background: #222;
        width: 24rem;
        height: .25rem;
        margin: 0 .5rem;
    }
    .duration::-webkit-slider-thumb, .duration::-moz-range-thumb {
        width: 3rem;
        height: 3rem;
        background: radial-gradient(#444 45%,#555 50%,#222 55%,#8C7853 57.5%,#8C7853 100%), conic-gradient(#4b4b4b 10deg,#777 45deg,#5b5b6b 70deg,#9f9f9f 105deg,#444 140deg,#AAA 185deg,#666 210deg,#999 245deg,#777 285deg,#9f9f9f 320deg,#4b4b4b);
        background-blend-mode: overlay;
        box-shadow: 0 0 1px 1px rgba(255,255,255,0.35) inset, 0 1px 1px 1px rgba(255,255,255,0.25) inset, 0 0 2px 2px rgba(0,0,0,0.15) inset, 0 1px 1px 1px rgba(0,0,0,0.35), 0 3px 2px 1px rgba(0,0,0,0.25), 0 6px 4px 3px rgba(0,0,0,0.15);
        border-radius: 1.5rem;
        cursor: pointer;
    }
    .duration::-webkit-slider-thumb {
        transform: translatey(-.600rem);
        width: 1.5rem;
        height: 1.5rem;
        background: radial-gradient(#444 45%,#555 50%,#222 55%,#8C7853 57.5%,#8C7853 100%), conic-gradient(#4b4b4b 10deg,#777 45deg,#5b5b6b 70deg,#9f9f9f 105deg,#444 140deg,#AAA 185deg,#666 210deg,#999 245deg,#777 285deg,#9f9f9f 320deg,#4b4b4b);
        background-blend-mode: overlay;
        box-shadow: 0 0 1px 1px rgba(255,255,255,0.35) inset, 0 1px 1px 1px rgba(255,255,255,0.25) inset, 0 0 2px 2px rgba(0,0,0,0.15) inset, 0 1px 1px 1px rgba(0,0,0,0.35), 0 3px 2px 1px rgba(0,0,0,0.25), 0 6px 4px 3px rgba(0,0,0,0.15);
        border-radius: 1.5rem;
        cursor: pointer;
        -webkit-appearance: none;
    }

    .coverImage{
        animation: circle 2s infinite ease-in-out;
    }

    .coverHole{
        position: absolute;
        z-index: 999;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        height: 16px;
        width: 16px;
    }

    @keyframes circle{
        0%{
            transform: rotate(0deg);
        }

        75%{
            transform: rotate(360deg);
        }

        100%{
            transform: rotate(360deg);
        }
    }

    .cursor-pointer{
        cursor: pointer;
    }

</style>
@endsection

<div class="text-white position-fixed bottom-0 bg-dark border border-warning rounded-pill p-3 d-none" id="mp3Player"
     style="width: 80%">
    <div class="w-100 d-flex justify-content-between">
        <div class="d-flex align-items-center gap-2 w-25">
            <div class="position-relative">
                <div class="bg-dark rounded-circle coverHole"></div>
                <img src="{{asset("img/cover.jpg")}}" id="coverImage" width="50" height="50" class="rounded-circle
                coverImage object-fit-cover">
            </div>
            <div class="d-flex flex-column justify-content-center">
                <span id="songTitle">Here i dreamt i was an architecht</span>
                <span id="songArtist">The Decemeberists</span>
            </div>
        </div>
        <div class="w-50 d-flex flex-column justify-content-center align-items-center gap-1">
            <div class="d-flex gap-4 fs-2">
                <i class="fa-solid fa-backward-step cursor-pointer"></i>
                <i class="fa-solid fa-circle-play cursor-pointer" id="play"></i>
                <i class="fa-solid fa-circle-pause cursor-pointer d-none" id="pause"></i>
                <i class="fa-solid fa-forward-step cursor-pointer"></i>
            </div>
            <div class="w-100 d-flex align-items-center gap-2">
                <span id="timePassed">0:00</span>
                <input type="range" max="100" value="0" class="w-100 duration" id="durationRange">
                <span id="songDuration">0:00</span>
            </div>
        </div>
        <div class="w-25 d-flex flex-column justify-content-center align-items-center gap-2">
            <div>
                <i class="fa-solid fa-bullseye cursor-pointer fs-2" id="visualizerToggler"></i>
            </div>
            <div>
                <i class="fa-solid fa-volume-low"></i>
                <input type="range" max="100" min="0" value="10" id="volumeSlider" class="volumeSlider">
            </div>
        </div>
    </div>
</div>
<audio controls id="player" class="d-none" src="{{asset("songs/song-1696014734.mp3")}}">
</audio>

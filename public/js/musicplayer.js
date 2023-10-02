import { createNoise3D } from "https://cdn.skypack.dev/simplex-noise";

const player = document.querySelector("#player");
const mp3Player = document.querySelector("#mp3Player");
const playButton = document.querySelector("#play");
const pauseButton = document.querySelector("#pause");
const songDuration = document.querySelector("#songDuration");
const songs = document.querySelectorAll(".song");
const volumeSlider = document.querySelector("#volumeSlider");
const timePassed = document.querySelector("#timePassed");
const durationRange = document.querySelector("#durationRange");
const title = document.querySelector("#songTitle");
const artist = document.querySelector("#songArtist");
const coverImage = document.querySelector("#coverImage");
const visualizerAmplitude = document.querySelector("#amplitudeSlider");
const LINES = 4;
const LINE_COLOR = "#FFE5A3";
// const FILL_COLOR = "rgba(242, 219, 160, 0.8)"
const PRECISION = 10;
// let AMPLITUDE = 100
const FREQUENCY = 0.002;

const params = {
    amplitude: 10
};

const simplex = createNoise3D();
const root = document.querySelector("#root");
const canvas = root.querySelector("canvas");

const context = canvas.getContext("2d");


const resizeObserver = new ResizeObserver(([entry]) => {
    const { width, height } = entry.contentRect;
    canvas.width = width;
    canvas.height = height;
});

class Line {
    constructor(context, i = Math.random()) {
        this.context = context;
        this.canvas = context.canvas;
        this.i = i;
    }
    get stepX() {
        return this.canvas.width / PRECISION;
    }
    update(t) {
        // prevent lines crossing at the edges
        const y = (this.i - LINES * 0.5 + 0.5) * 5;
        const offset = this.canvas.height / 2 + y;
        this.points = new Array(Math.ceil(this.stepX) + 1).fill(0).map((_, i) => {
            // increase amplitude in middle
            const multiplier =
                Math.sin(
                    ((this.canvas.width - i * PRECISION) / this.canvas.width) * Math.PI
                ) * 0.75;
            return {
                x: i * PRECISION,
                y:
                    simplex(i * PRECISION * FREQUENCY, this.i, t) *
                    params.amplitude *
                    multiplier +
                    offset
            };
        });
    }
}

class AudioWave {
    constructor(context) {
        this.context = context;
        this.canvas = context.canvas;
        this.lines = [];
        for (let i = 0; i < LINES; i++) {
            this.lines.push(new Line(context, i));
        }
    }
    get stepX() {
        return this.canvas.width / PRECISION;
    }
    draw(t) {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
        this.lines.forEach((line) => line.update(t));
        this.context.globalAlpha = 0.33;
        const shape1 = [...this.lines[0].points, ...this.lines[2].points.reverse()];
        this.context.save();
        this.context.beginPath();
        shape1.forEach(({ x, y }) => {
            this.context.lineTo(x, y);
        });
        let gradient = this.context.createLinearGradient(0, 0, this.canvas.width, 0);
        gradient.addColorStop(0, "rgba(194,167,98,0)");
        gradient.addColorStop(1, "rgba(242,219,160,0.8)");
        this.context.fillStyle = gradient;
        this.context.fill();
        this.context.closePath();
        this.context.restore();
        this.context.globalAlpha = 0.5;
        const shape2 = [...this.lines[1].points, ...this.lines[3].points.reverse()];
        this.context.save();
        this.context.beginPath();
        shape2.forEach(({ x, y }) => {
            this.context.lineTo(x, y);
        });
        gradient = this.context.createLinearGradient(0, 0, 0, this.canvas.height);
        gradient.addColorStop(0.8, "rgba(194,167,98,0)");
        gradient.addColorStop(0.2, "rgba(242,219,160,0.8)");
        this.context.fillStyle = gradient;
        this.context.fill();
        this.context.closePath();
        this.context.restore();
        this.context.globalAlpha = 1;
        this.lines.forEach(({ points }) => {
            this.context.save();
            this.context.beginPath();
            points.forEach(({ x, y }, i) => {
                this.context.lineTo(x, y);
            });
            this.context.strokeStyle = LINE_COLOR;
            this.context.stroke();
            this.context.closePath();
            this.context.restore();
        });
    }
}
const audioWave = new AudioWave(context);
let isUserSeeking = false;

songs.forEach((song) => {
    song.addEventListener("dblclick", () => {
        mp3Player.classList.remove("d-none");
        player.src = `${song.dataset.song}`;
        title.textContent = `${song.dataset.title}`;
        artist.textContent = `${song.dataset.artist}`;
        coverImage.src = `${song.dataset.image}`;
        requestAnimationFrame(raf);
        changeButtons("play");
        displayDuration();
        player.play();
        gsap.to(params, {
            duration: 1.5,
            amplitude: 100,
            ease: "expo.out"
        });
    })
})

visualizerAmplitude.addEventListener("change", () => {
    gsap.to(params, {
        duration: 1.5,
        amplitude: visualizerAmplitude.value,
        ease: "expo.out"
    });
})

const changeButtons = (type) => {
    if(type === "play")
    {
        pauseButton.classList.remove('d-none');
        pauseButton.classList.add("d-block");
        playButton.classList.remove("d-block");
        playButton.classList.add("d-none");
        player.play();
        gsap.to(params, {
            duration: 1.5,
            amplitude: visualizerAmplitude.value,
            ease: "expo.out"
        });
    }
    else
    {
        pauseButton.classList.add('d-none');
        pauseButton.classList.remove("d-block");
        playButton.classList.add("d-block");
        playButton.classList.remove("d-none");
        player.pause();
        gsap.to(params, {
            duration: 1.5,
            amplitude: 10,
            ease: "expo.out"
        });
    }
}

resizeObserver.observe(root);

function raf(t) {
    audioWave.draw(t * 0.001);
    requestAnimationFrame(raf);
}

playButton.addEventListener("click", () => {
    changeButtons("play");
})

pauseButton.addEventListener("click", () => {
    changeButtons("pause");
})

const changeVolume = () => {
    player.volume = volumeSlider.value / 100;
}

volumeSlider.addEventListener("input", () => {
    changeVolume();
})

const calcTime = (secs) => {
    const minutes = Math.floor(secs / 60);
    const seconds = Math.floor(secs % 60);
    const returnedSeconds = seconds < 10 ? `0${seconds}` : `${seconds}`;

    return `${minutes}:${returnedSeconds}`;
}

const displayDuration = () => {
    setTimeout(() => {
        songDuration.textContent = calcTime(player.duration);
        durationRange.max = player.duration;
    }, 100)
}

player.addEventListener("timeupdate", () => {
    if(!isUserSeeking)
    {
        const currentTime = player.currentTime;
        timePassed.textContent = calcTime(currentTime);
        durationRange.value = currentTime;
    }
})

durationRange.addEventListener("input", () => {
    isUserSeeking = true;
})

durationRange.addEventListener("mouseup", () => {
    player.currentTime = durationRange.value;
    isUserSeeking = false;
})

displayDuration();
changeVolume();

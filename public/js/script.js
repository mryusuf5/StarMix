const visualizerToggler = document.querySelector("#visualizerToggler");
const visualizerContainer = document.querySelector("#visualizerContainer");
const songsContainer = document.querySelector("#songsContainer");

visualizerToggler.addEventListener("click", () => {
    if(visualizerContainer.classList.contains("d-none"))
    {
        visualizerToggler.classList.remove("text-white");
        visualizerToggler.classList.add("text-warning");
        visualizerContainer.classList.add("d-block");
        visualizerContainer.classList.remove("d-none");
        songsContainer.classList.add("d-none");
        songsContainer.classList.remove("d-block");
    }
    else
    {
        visualizerToggler.classList.add("text-white");
        visualizerToggler.classList.remove("text-warning");
        visualizerContainer.classList.remove("d-block");
        visualizerContainer.classList.add("d-none");
        songsContainer.classList.remove("d-none");
        songsContainer.classList.add("d-block");
    }
})

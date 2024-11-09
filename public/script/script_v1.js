const init = () => {
    // hamburger function
    $id("hamburger-btn").addEventListener("click", () => {
        $id("menubar").classList.toggle("-left-full");
        $id("menubar").classList.toggle("left-0");
    })
}

document.readyState == "interactive" ? init() : document.addEventListener("DOMContentLoaded", init);
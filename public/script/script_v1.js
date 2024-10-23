const $ = e => document.querySelector(e);
const $all = e => document.querySelectorAll(e);
const $id = e => document.getElementById(e);

const init = () => {
    const volunteerFormBtn = document.getElementById('volunteer-form-btn');
    const formContainer = document.querySelector(".form-container");

    volunteerFormBtn.addEventListener("click", () => {
        formContainer.classList.toggle("flex");
        formContainer.classList.toggle("hidden");
    })

    // hamburger function
    $id("hamburger-btn").addEventListener("click", () => {
        $id("menubar").classList.toggle("-left-full");
        $id("menubar").classList.toggle("left-0");
    })
}

document.readyState == "interactive" ? init() : document.addEventListener("DOMContentLoaded", init);
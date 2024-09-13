const init = () => {
    const volunteerFormBtn = document.getElementById('volunteer-form-btn');
    const formContainer = document.querySelector(".form-container");

    volunteerFormBtn.addEventListener("click", () => {
        formContainer.classList.toggle("flex");
        formContainer.classList.toggle("hidden");
    })
}

document.readyState == "interactive" ? init() : document.addEventListener("DOMContentLoaded", init);
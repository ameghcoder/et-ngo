
const afterRunSlide = (slideNumber = 1) => {
    const glideLeftArrow = $(".volunteer-form-btn--left");
    const glideRightArrow = $(".volunteer-form-btn--right");

    // Smoothly update the arrow visibility or text content
    glideLeftArrow.style.transition = "opacity 0.3s ease, transform 0.3s ease";
    glideRightArrow.style.transition = "opacity 0.3s ease, transform 0.3s ease";

    switch (slideNumber) {
        case 0:
            glideLeftArrow.style.opacity = "0"; // Hide smoothly
            glideLeftArrow.style.transform = "translateX(-10px)"; // Slide out
            glideRightArrow.innerHTML = "Start";
            glideRightArrow.setAttribute("data-glide-dir", ">");
            break;

        case 1:
            glideLeftArrow.style.opacity = "1"; // Show smoothly
            glideLeftArrow.style.transform = "translateX(0px)"; // Slide back
            glideRightArrow.innerHTML = "Next";
            glideRightArrow.setAttribute("data-glide-dir", ">");
            break;

        case 2:
            glideLeftArrow.style.opacity = "1";
            glideRightArrow.innerHTML = "Next";
            glideRightArrow.setAttribute("data-glide-dir", ">");
            break;

        case 3:
            glideLeftArrow.style.opacity = "1";
            glideRightArrow.innerHTML = "Submit";
            glideRightArrow.removeAttribute("data-glide-dir");

            break;

        case 4:
            glideLeftArrow.style.opacity = "0"; // Hide smoothly
            glideLeftArrow.style.transform = "translateX(-10px)";
            glideRightArrow.innerHTML = "Go To Homepage";
            glideRightArrow.removeAttribute("data-glide-dir");
            glideRightArrow.addEventListener("click", () => {
                window.location.href = "/";
            })
            break;
    }
}

const setChildWidth = (val) => {
    const glideSlideChild = $all(".volunteerFormChildContainer");
    glideSlideChild.forEach(child => {
        child.style.width = `${val}px`;
    })

    let currentSlide = $id("volunteer-form-container").getAttribute("data-current-slide");
    $id("volunteer-form-container").style.transform = `translateX(-${parseInt(currentSlide) * val})`;
}
const updateProgressBar = (slide) => {
    console.log(slide);
    $id("progress-bar").style.width = (20 * (slide + 1))  + "%" ;
    $id("progress-bar").innerHTML = (20* (slide + 1))  + "%" ;
}

const volunteerWithUs = () => {
    // Variables 
    const glideSlide = $id("volunteer-form-container");
    glideSlide.style.width = `${parseInt(glideSlide.children.length) * $("body").clientWidth}px`;
    setChildWidth( $("body").clientWidth);    
    
    window.onresize = () => {
        glideSlide.style.width = `${parseInt(glideSlide.children.length) * $("body").clientWidth}px`;
        setChildWidth( $("body").clientWidth);    
    }

    const preSlideBtn = $(".volunteer-form-btn--left");
    const nextSlideBtn = $(".volunteer-form-btn--right");

    // Form Handling code and submit form
    // check the form element
    let fullName = $id("volunteerName");
    let education = $id("volunteerEducation");
    let email = $id("volunteerEmail");
    let number = $id("volunteerNumber");
    let occupation = $id("volunteerOccupation");
    let designation = $id("volunteerDesignation");
    let pincode = $id("volunteerPinCode");
    let city = $id("volunteerCity");
    let state = $id("volunteerState");
    let country = $id("volunteerCountry");
    let atp_yes = $id("available_to_participate_yes");
    let message = $id("volunteerMessage");

    const validatedValues = {
        fullName: [
            "string",
            false
        ],
        education: [
            "string",
            false
        ],
        email: [
            "email",
            false
        ],
        number: [
            "mobile",
            false
        ],
        occupation: [
            "string",
            false
        ],
        designation: [
            "string",
            false
        ],
        pincode: [
            "number",
            false
        ],
        city: [
            "string",
            false,
        ],
        state: [
            "string",
            false
        ],
        country: [
            "string",
            false
        ],
        message: [
            "msg",
            false
        ]
    }

    const elements = {
        fullName,
        education,
        email,
        number,
        occupation,
        designation,
        pincode,
        city,
        state,
        country,
        message
    }

    Object.keys(validatedValues).forEach(key => {
        elements[key].addEventListener("keyup", (e) => {
            let validate = Validator.validate(validatedValues[key][0], e.target.value);
            checkInputValue(elements[key], validate);
            validatedValues[key][1] = validate;
        })
    })

    const submitForm = (btn) => {
        if(
            validatedValues.fullName[1] &&
            validatedValues.education[1] &&
            validatedValues.email[1] &&
            validatedValues.number[1] &&
            validatedValues.occupation[1] &&
            validatedValues.designation[1] &&
            validatedValues.pincode[1] &&
            validatedValues.city[1] &&
            validatedValues.state[1] &&
            validatedValues.country[1] &&
            validatedValues.message[1]
        ){
            const form = new FormData();
            form.append("name", fullName.value);
            form.append("email", email.value);
            form.append("mobile_number", number.value);
            form.append("education", education.value);
            form.append("occupation", occupation.value);
            form.append("designation", designation.value);
            form.append("pincode", parseInt(pincode.value));
            form.append("city", city.value);
            form.append("state", state.value);
            form.append("country", country.value);
            form.append("atp", atp_yes.value ? "yes" : "no");
            form.append("message", message.value);

            btn.innerHTML = "Wait...";
            btn.setAttribute("disabled", true);

            fetchDataVersion2(`/api/volunteerform`, "POST", form)
            .then(response => {
                if(isValidJsonData(response)){
                    btn.innerHTML = "Submit";
                    btn.removeAttribute("disabled");

                    if(response["type"] == "error"){
                        Toast.Error(response["message"]);
                    } else if(response["type"] == "success"){
                        Toast.ToastPop("success", response["message"]);
                        Object.keys(validatedValues).forEach(key => {
                            elements[key].innerHTML = "";
                        })
                        slide(1, false);
                    } 
                } else{
                    throw new Error("Reload page or Try again later");
                }
            })
        } else{
            Toast.Error(`Some of the field is Empty or Invalid (check the red border)`);
        }
    }


    // essential functions like moving slide and submit the form
    // Moving slide function
    const slide = (turn, specialCondition = true) => {
        let glideSlide = $id('volunteer-form-container');
        let windowWidth = $("body").clientWidth;

        // -1 means previous and 1 or +1 means next turn
        let currentSlide = glideSlide.getAttribute("data-current-slide");
        let transformLeftValue = 0;
        
        if(turn > 0 && specialCondition && currentSlide == 3){
            submitForm(nextSlideBtn);
            return 0;
        }

        let slideNumber = 1;
        if(currentSlide > -1 || currentSlide < 5){
            slideNumber = parseInt(currentSlide) + turn;
            transformLeftValue = `${parseInt(slideNumber) * windowWidth}px`;
        } 

        // increase current slide value
        glideSlide.setAttribute("data-current-slide", slideNumber);
        
        glideSlide.style.transform = `translateX(-${transformLeftValue})`;

        // after run slide change the appearence of the back and forth button
        afterRunSlide(slideNumber);
        updateProgressBar(slideNumber);
    }

    preSlideBtn.addEventListener("click", () => {
        slide(-1)
    });
    nextSlideBtn.addEventListener("click", () => {
        slide(1)
    });
    
    afterRunSlide();

}

document.readyState == "interactive" 
    ? volunteerWithUs()
    : document.addEventListener("DOMContentLoaded", volunteerWithUs);
const contact = () => {
    const fname = $id("first-name");
    const lname = $id("last-name");
    const pnumber = $id("phone-number");
    const email = $id("email-address");
    const message = $id("message");
    const validatedValues = {
        fname: [
            "string",
            false
        ],
        lname: [
            "string",
            false
        ],
        pnumber: [
            "mobile",
            false
        ],
        email: [
            "email",
            false
        ],
        message: [
            "msg",
            false
        ]
    }

    const elements = {
        fname,
        lname,
        pnumber, 
        email,
        message
    }

    Object.keys(validatedValues).forEach(key => {
        elements[key].addEventListener("keyup", (e) => {
            let validate = Validator.validate(validatedValues[key][0], e.target.value);
            checkInputValue(elements[key], validate);
            validatedValues[key][1] = validate;
        })
    })

    $id("contact_us").addEventListener("click", (e) => {
        if(
            validatedValues.fname[1] &&
            validatedValues.lname[1] &&
            validatedValues.pnumber[1] &&
            validatedValues.email[1] &&
            validatedValues.message[1]
        ){
            const form = new FormData();
            form.append("fname", fname.value);
            form.append("lname", lname.value);
            form.append("number", pnumber.value);
            form.append("email", email.value);
            form.append("message", message.value);
            form.append("country_code", $id("country_code").value);

            e.target.innerHTML = "Wait ...";
            e.target.setAttribute("disabled", "true");

            fetchDataVersion2(`/api/contactform`, "POST", form)
            .then(response => {
                if(isValidJsonData(response)){
                    e.target.innerHTML = "Submit";
                    e.target.removeAttribute("disabled");
                    if(response["type"] == "error"){
                        Toast.Error(response["message"]);
                    } else if(response["type"] == "success"){
                        Toast.ToastPop("success", response["message"]);
                        fname.value = lname.value = pnumber.value = email.value = message.value = "";
                    } else{
                        throw new Error("Something went wrong");
                    }
                } else{
                    throw new Error("Reload page, or Try again later");
                }
            })
        } else{
            let fieldName = "";
            switch (false) {
                case validatedValues.fname[1]:
                    fieldName = "First Name";
                    break;                
                case validatedValues.lname[1]:
                    fieldName = "Last Name";
                    break;
                case validatedValues.pnumber[1]:
                    fieldName = "Number";
                    break;
                case validatedValues.email[1]:
                    fieldName = "Email";
                    break;                
                case validatedValues.message[1]:
                    fieldName = "Message";
                    break;
            
                default:
                    break;
            }
            Toast.Error(`${fieldName} field is Empty or Invalid`);
        }
    })
}

document.readyState == "interactive" 
    ? contact() 
    : document.addEventListener("DOMContentLoaded", contact);
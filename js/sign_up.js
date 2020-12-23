/*
Program validates user signup details
*/
/* First name validation - Required */
function validateFirstName(inputTxt){
    const first = document.getElementById("firstname");
    const message = document.getElementById("1");
    var fname_regex = /^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/;
    if(inputTxt.value !=""){
        if(!(inputTxt.value.trim().match(fname_regex))){
            message.textContent = "invalid firstname";
            first.focus();
        }
        else{
            message.textContent = "";
        }
    }

}

/* Last name - required */
function validateLastName(inputTxt){
    const surname = document.getElementById("surname");
    const message = document.getElementById("2");
    var sname_regex = /^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*/;
    if(inputTxt.value !=""){
        if(!(inputTxt.value.trim().match(sname_regex))){
            message.textContent = "invalid lastname";
            surname.focus();
        }
        else{
            message.textContent = "";
        }
    }
}

/* User name - required */
function validateUserrName(inputTxt){
    const username = document.getElementById("username");
    const message = document.getElementById("3");
    var uname_regex = /\w/;
    if(inputTxt.value !=""){
        if(!(inputTxt.value.trim().match(uname_regex))){
            message.textContent = "invalid username";
            username.focus();
        }
        else{
            message.textContent = "";
        }
    }

}

/* email validation */
function validateEmail(inputTxt){
    const email = document.getElementById("email");
    const message = document.getElementById("4");
    var email_regex = /([a-zA-Z0-9]+)([\.{1}])?([a-zA-Z0-9]+)\@gmail([\.])com/;
    // for gmail only /^[\w-\.]+@(gmail.com)$/
    if(inputTxt.value !=""){
        if(!(inputTxt.value.trim().match(email_regex))){
            message.textContent = "invalid GMAIL";
            email.focus();
        }
        else{
            message.textContent = "";
        }
    }
}
/* Phone number validation */
function validatePhone(inputTxt){
    const phone = document.getElementById("phone");
    const message = document.getElementById("5");
    var phone_regex = /^\+?([0-9]{1,3})\)?([\d ]{9,15})$/;
    if(inputTxt.value !=""){
        if(!(inputTxt.value.trim().match(phone_regex))){
            message.textContent = "invalid";
            phone.focus();
        }
        else{
            message.textContent = "";
        }
    }
    
}

/* Phone number validation */
function validateLocation(inputTxt){
    const location = document.getElementById("location");
    const message = document.getElementById("6");
    var loc_regex = /^[a-zA-Z0-9\s,.'-]{2,}$/;
    if(inputTxt.value !=""){
        if(!(inputTxt.value.trim().match(loc_regex))){
            message.textContent = "invalid";
            location.focus();
        }
        else{
            message.textContent = "";
        }
    }

}

/* Password validation */
function validatePassword(){
    const password = document.getElementById("password");
    const password1 = document.getElementById("password1");
    if(password.value !="" && password1.value !=""){
        if(password1.value.trim()!=password.value.trim()){
            password1.setCustomValidity("Passwords do not match");
        }
        else{
            password1.setCustomValidity("");
        }
    }

    
}


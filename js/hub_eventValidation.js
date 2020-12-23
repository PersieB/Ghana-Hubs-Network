/* Frontend validation for Hub & Events Data */

/* Hub name validation */
function validateName(inputTxt){
    const name = document.getElementById("name");
    const message = document.getElementById("1");
    var name_regex = /^[.@&]?[a-zA-Z0-9 ]+[ !.@&()]?[ a-zA-Z0-9!()]+/;
    if(inputTxt.value !=""){
        if(!(inputTxt.value.trim().match(name_regex))){
            message.textContent = "invalid";
            name.focus();
        }
        else{
            message.textContent = "";
        }
    }

}

/* Phone validation */
function validatePhone(inputTxt){
    const phone = document.getElementById("phone");
    const message = document.getElementById("2");
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

/* Email validation */

function validateEmail(inputTxt){
    const email = document.getElementById("email");
    const message = document.getElementById("3");
    var email_regex = /([a-zA-Z0-9]+)([\.{1}])?([a-zA-Z0-9]+)\@gmail([\.])com/;
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




/* website validation */
function validateUrl(inputTxt){
    const link = document.getElementById("link");
    const message = document.getElementById("4");
    var url_regex = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&\\=]*)/;
    if(inputTxt.value !=""){
        if(!(inputTxt.value.trim().match(url_regex))){
            message.textContent = "invalid";
            link.focus();
        }
        else{
            message.textContent = "";
        }
    }

}


/*Start time  validation */
function validateStartTime(inputTxt){
    const time = document.getElementById("start");
    const message = document.getElementById("7");
    var time_regx = /^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/;
    if(inputTxt.value !=""){
        if(!(inputTxt.value.trim().match(time_regx))){
            message.textContent = "invalid time format";
            time.focus();
        }
        else{
            message.textContent = "";
        }
    }
}

/* end time validation */
function validateEndTime(inputTxt){
    const time = document.getElementById("end");
    const message = document.getElementById("8");
    var time_regx = /^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/;
    if(inputTxt.value !=""){
        if(!(inputTxt.value.trim().match(time_regx))){
            message.textContent = "invalid time format";
            time.focus();
        }
        else{
            message.textContent = "";
        }
    }
}

/* date validation */
function validateDate(inputTxt){
    const date = document.getElementById("date");
    const message = document.getElementById("9");
    var date_regx = /([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/;
    if(inputTxt.value !=""){
        if(!(inputTxt.value.trim().match(date_regx))){
            message.textContent = "invalid date format";
            date.focus();
        }
        else{
            message.textContent = "";
        }
    }
}

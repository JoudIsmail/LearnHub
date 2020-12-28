/* Variables */
const email = document.getElementById('email');
const password = document.getElementById('password');
const log = document.getElementById('tooltip');
const logInvalid = document.getElementById('tooltip-1');
const logPass = document.getElementById('tooltipPass');
const confirmPass = document.getElementById('confirm-pass');
const logPassStrength = document.getElementById('tooltipPassStrength');
const logConfirmPass = document.getElementById('tooltipPassConf');

/* Buttons */
const btn = document.getElementById('login');
const btnReg = document.getElementById('register');

/* Core Functions */

// Disable Whitespaces in Password fields
function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;
}

// Check Which Page Is Opened
var sPath = window.location.pathname;
var sPage = sPath.substring(sPath.lastIndexOf('/')+1);

// Check And Decide Which Button To Be Disabled
function checkButton(button){
    if(button == true){
        if(sPage == "anmelden.php"){
            btn.disabled = true;
            btn.setAttribute("disabled","disabled");
        }else if(sPage == "registrieren.php"){
            btnReg.disabled = true;
            btnReg.setAttribute("disabled","disabled");
        }
    }else if(button == false){
        if(sPage == "anmelden.php"){
            btn.disabled = false;
            btn.removeAttribute("disabled");
        }else if(sPage == "registrieren.php"){
            btnReg.disabled = false;
            btnReg.removeAttribute("disabled");
        }
    }
}

// Check If Input Is Empty 
function isInputEmpty(input){
    if(input.value.length === 0){
        return true;
    }
    return false;
}

// Check If Mail Is Valid
function isMailValid (email) {
    return /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(email.value);
  }

  // Check If Password Is Strong
function isPasswordStrong(password){
    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!&quot#$%&'()*+,-./:;<=>?@[\\]^_`{|}~\$%\^&\*\(\)])(?!.* )(?=.{14,20})");
    
    if(strongRegex.test(password.value)){
        return true;
    }
    return false;
}

// Check If Password Is Weak
function isPasswordWeak(password){
    var weakRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!&quot#$%&'()*+,-./:;<=>?@[\\]^_`{|}~\$%\^&\*\(\)])(?!.* )(?=.{8,20})");

    if(weakRegex.test(password.value)){
        return true;
    }
    return false;
}

// Check If Password And Confirm Password Match
function isConfirmValid(password, password2){
    if(password.value != password2.value){
        return false;
    }
    return true;
}

/* Event Listeners */

addListenerMulti(email, 'keyup change', function(){
    if(isInputEmpty(email)){
        printThis('false', log, 'emptyMail');
        printThis('true', logInvalid, '');
        checkValidity();
    }else if(!isMailValid(email)){
        printThis('false', logInvalid, 'invalidMail');
        printThis('true', log, '');
        checkValidity();
    }else{
        printThis('true', log, '');
        printThis('true', logInvalid, '');
        checkValidity();
    }
});

// register thes Event Listeners after checking pages
if(sPage == 'anmelden.php'){
    addListenerMulti(password, 'keyup change', function(){
        if(isInputEmpty(password)){
            printThis('false', logPass, 'emptyPassword');
            checkValidity();
        }else{
            printThis('true', logPass, '');
            checkValidity();
        }
    });
}

// the trick is to check confirm pass in password listener
if(sPage == 'registrieren.php'){
    addListenerMulti(password, 'keyup change', function(){
        if(isInputEmpty(password)){
            printThis('false', logPass, 'emptyPassword');
            printThis('true', logPassStrength, '');
            if(!isConfirmValid(password, confirmPass)){
                printThis('false', logConfirmPass, 'noMatch');
                checkValidity();
            }else{
                printThis('false', logConfirmPass, '');
                checkValidity();
            }
        }else if(isPasswordStrong(password)){
            printThis('1', logPassStrength, 'strong');
            printThis('true', logPass, '');
            if(!isConfirmValid(password, confirmPass)){
                printThis('false', logConfirmPass, 'noMatch');
                checkValidity();
            }else{
                printThis('false', logConfirmPass, '');
                checkValidity();
            }
        }else if(isPasswordWeak(password)){
            printThis('2', logPassStrength, 'weak');
            printThis('true', logPass, '');
            if(!isConfirmValid(password, confirmPass)){
                printThis('false', logConfirmPass, 'noMatch');
                checkValidity();
            }else{
                printThis('false', logConfirmPass, '');
                checkValidity();
            }
        }else if((!isInputEmpty(password)) && (!isPasswordStrong(password)) && (!isPasswordWeak(password))){
            printThis('false', logPassStrength, 'ivalidPassword');
            if(!isConfirmValid(password, confirmPass)){
                printThis('false', logConfirmPass, 'noMatch');
                checkValidity();
            }else{
                printThis('false', logConfirmPass, '');
                checkValidity();
            }
        }
        else{
            printThis('true', logPass, '');
            printThis('true', logPassStrength, '');
            checkValidity();
        }
    });

    addListenerMulti(confirmPass, 'keyup change', function(){
        if(!isConfirmValid(password, confirmPass)){
            printThis('false', logConfirmPass, 'noMatch');
            checkValidity();
        }else{
            printThis('true', logConfirmPass, '');
            checkValidity();
        }
    });
}




//print this standard
function printThis(valid, input, message){
    if(valid=='true'){
        input.style.display = 'none';
    }else if(valid == '1'){
        invalidMessages(message);
        input.style.display = "block";
        input.style.color = "green";
        input.style.fontSize = "18px";
    }else if(valid == '2'){
        invalidMessages(message);
        input.style.display = "block";
        input.style.color = "orange";
        input.style.fontSize = "18px";
    }else{
        invalidMessages(message);
        input.style.display= 'block';
        input.style.color = 'red';
        input.style.fontSize = '18px';
    }
}

// Display Invalid Message
function invalidMessages(statement){
    switch(statement){
        case "emptyMail":
            log.textContent = "* Please Enter your Email";
            break;
        case "invalidMail":
            logInvalid.textContent = "* Please Enter a valid Email";
            break;
        case "emptyPassword":
            logPass.textContent = "* Please Enter your Password";
            break;
        case "strong":
            logPassStrength.textContent = "Strong Password!";
            break;
        case "weak":
            logPassStrength.textContent = "Weak Password!";
            break;
        case "ivalidPassword":
            logPassStrength.innerHTML = "* Password must be between 8 to 20 characters which contain:<ul><li>at least one lowercase letter.</li><li>one uppercase letter</li><li>one numeric digit</li><li>one special character</li><li>no white spaces</li></ul>";
            break;
        case "noMatch":
            logConfirmPass.textContent = "* Passwords don't match";
            break;
    }
}

// disable button on load page
const body = document.querySelector('body');
body.onload = checkValidity();

// check validity to disable button
function checkValidity(){
    //check the page first
    if(sPage == 'anmelden.php'){
        if((isInputEmpty(email)) || isInputEmpty(password) || (!isMailValid(email))){
            checkButton(true);
        }else{
            checkButton(false);
        }
    }

    if(sPage == 'registrieren.php'){
        if((isInputEmpty(email)) || isInputEmpty(password) || (!isMailValid(email)) || ((!isPasswordStrong(password)) && (!isPasswordWeak(password))) || (!isConfirmValid(password, confirmPass))){
            checkButton(true)
        }else{
            checkButton(false);
        }
    }
}

// add one or more listeners to an element
function addListenerMulti(element, eventNames, listener) {
    var events = eventNames.split(' ');
    for (var i=0, iLen=events.length; i<iLen; i++) {
      element.addEventListener(events[i], listener, false);
    }
  }

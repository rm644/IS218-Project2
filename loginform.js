/*
<!-- Rishabh Mehta
Project 2 - 09/03/20
Part 1: Login Form (Javascript)
-Email 
-Password --
*/


function checkForm() {
    var isValidForm = true;
    var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    document.getElementById('spValidationEmail').innerHTML = '';
    document.getElementById('spValidationPassword').innerHTML = '';

    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    if (email.trim().length == 0) {
        isValidForm = false;
        document.getElementById('spValidationEmail').innerHTML = 'Email is empty<br/>';
    } else if (!pattern.test(email)) {
        isValidForm = false;
        document.getElementById('spValidationEmail').innerHTML = 'Email is invalid<br/>';
    }

    if (password.length < 8) {
        isValidForm = false;
        document.getElementById('spValidationPassword').innerHTML = 'Password is invalid <br/>';
    }
    return isValidForm;
}
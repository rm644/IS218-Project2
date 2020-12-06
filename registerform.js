function checkForm() {
    var isValidForm = true;
    var patternEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var patternDate =/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/;

    document.getElementById('spFirstName').innerHTML = '';
    document.getElementById('spLastName').innerHTML = '';
    document.getElementById('spBirthday').innerHTML = '';
    document.getElementById('spValidationEmail').innerHTML = '';
    document.getElementById('spValidationPassword').innerHTML = '';

    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var birthday = document.getElementById("birthday").value;    
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    if (firstname.length == 0) {
        isValidForm = false;
        document.getElementById('spFirstName').innerHTML = 'Please enter your name<br/>';
    }

    
    if (lastname.length == 0) {
        isValidForm = false;
        document.getElementById('spLastName').innerHTML = 'Please enter your name<br/>';
    }

    if (birthday.length == 0) {
        isValidForm = false;
        document.getElementById('spBirthday').innerHTML = 'Enter a date<br/>';} 
    else if (!patternDate.test(birthday)) {
            isValidForm = false;
            document.getElementById('spBirthday').innerHTML = 'Date is invalid<br/>';
    }

    if (email.trim().length == 0) {
        isValidForm = false;
        document.getElementById('spValidationEmail').innerHTML = 'Email is empty<br/>';
    } else if (!patternEmail.test(email)) {
        isValidForm = false;
        document.getElementById('spValidationEmail').innerHTML = 'Email is invalid<br/>';
    }

    if (password.length < 8) {
        isValidForm = false;
        document.getElementById('spValidationPassword').innerHTML = 'Password is invalid <br/>';
    }

    return isValidForm;
}
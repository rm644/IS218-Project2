/*
<!-- Rishabh Mehta
Project 2 - 11/19/20
Part 3: Question Form (Javascript)
-Question Name 
-Question Body
-Question Skills
*/


function checkForm() {
    var isValidForm = true;

    document.getElementById('spQuestionName').innerHTML = '';
    document.getElementById('spQuestionBody').innerHTML = '';
    document.getElementById('spQuestionSkills').innerHTML = '';

    var questionName = document.getElementById("questionName").value;
    var questionBody = document.getElementById("questionBody").value;
    

    if (questionName.length == 0 && questionName.length < 3) {
        isValidForm = false;
        document.getElementById('spQuestionName').innerHTML = 'Please enter a question name.<br/>';

    }

    if (questionBody.length == 0) {
        isValidForm = false;
        document.getElementById('spQuestionBody').innerHTML = 'Please enter a question body.<br/>';
    }

    return isValidForm;
}
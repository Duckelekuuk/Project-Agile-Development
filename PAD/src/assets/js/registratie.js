$(document).ready(function () {
    $('#signup-form').submit(function(e) {
        e.preventDefault();
        var enteredFullname = document.getElementById('registerFullname').value;
        var enteredEmail = document.getElementById('registerEmail').value;
        var enteredUsername = document.getElementById('registerUsername').value;
        var enteredNumberplate = document.getElementById('registerNumberplate').value;
        var enteredPassword = document.getElementById('registerPassword').value;
        checkEverything();

        function checkEverything() {
            if(enteredFullname.length < 5 || enteredFullname.length > 16) {
                alert("Username moet tussen de 5 en de 15 tekens zijn.");
            }
            if(!(enteredEmail.includes("@") && enteredEmail.includes("."))) {
                alert("Goodjob je kan niks");
            } else {
                //indexof gebruiken voor locatie van @ en . bij toekomstige check
                alert("Goodjob bro")
            }
        }
    });
});
$(document).ready(function () {
    $('#loginform').submit(function(e) {
        var enteredUsername = document.getElementById('username').value;
        var enteredPassword = document.getElementById('password').value;

        if(enteredUsername == "Admin" && enteredPassword == "Admin") {
            alert("succesvol ingelogd")
        } else {
            e.preventDefault();
        }
    });
});
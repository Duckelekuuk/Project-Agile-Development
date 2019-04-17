$(document).ready(function () {
    $('#signup-form').submit(function(e) {
        var enteredFullname = document.getElementById('registerFullname').value;
        var enteredEmail = document.getElementById('registerEmail').value;
        var enteredUsername = document.getElementById('registerUsername').value;
        var enteredNumberplate = document.getElementById('registerNumberplate').value;
        var enteredPassword = document.getElementById('registerPassword').value;

        
        e.preventDefault();
    })
});
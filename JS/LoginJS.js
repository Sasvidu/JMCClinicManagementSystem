function getEmailHelper(){
    
    document.getElementById('emailHelper').innerHTML = "We won't share your email with anyone.";

}

function showPasswordFunction(){

    passwordField = document.getElementById('password');
    icon = document.getElementById('eye-icon');

    if(passwordField.type == "password"){
        passwordField.type = "text";
        icon.className="fa-solid fa-eye-slash";
    }else if(passwordField.type == "text"){
        passwordField.type="password";
        icon.className="fa-solid fa-eye";
    }

}

function loginHoverfunction(){

    document.body.style.animation="BodyColorChange 0ms linear 0ms 1 normal both";

}

function loginDeHoverfunction(){

    document.body.style.animation="BodyColorChange 0ms linear 0ms 1 reverse both";

} 

function showForgotPasswordModal(){

    $( document ).ready(function() {

        let email = document.getElementById('username').value;
        $("#ForgotPasswordModal").modal();
        $(".modal-body #email").val(email);
        
    });

}
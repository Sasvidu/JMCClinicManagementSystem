function getEmailHelper(){
    
    document.getElementById('emailHelper').innerHTML = "We won't share your email with anyone.";

}

function showPasswordFunction(){

    passwordField = document.getElementById('password');
    icon = document.getElementById('eye-icon1');

    if(passwordField.type == "password"){
        passwordField.type = "text";
        icon.className="fa-solid fa-eye-slash";
    }else if(passwordField.type == "text"){
        passwordField.type="password";
        icon.className="fa-solid fa-eye";
    }

}

function showRePasswordFunction(){

    passwordField = document.getElementById('rePassword');
    icon = document.getElementById('eye-icon2');

    if(passwordField.type == "password"){
        passwordField.type = "text";
        icon.className="fa-solid fa-eye-slash";
    }else if(passwordField.type == "text"){
        passwordField.type="password";
        icon.className="fa-solid fa-eye";
    }

}


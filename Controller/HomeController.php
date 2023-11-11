<?php

    //Verify the controller was accessed through a view element:
    if(!($_GET['status'] == 'true')){

        header("location: ../index.html");

    }else{

        if(($_POST['submit'] == 'navLogin') || ($_POST['submit'] == 'Login')){
            header("location: ../View/Login.php");
        }else if(($_POST['submit'] == 'navSignup') || ($_POST['submit'] == 'Signup')){
            header("location: ../View/SignUp.php");
        }else{
            header("location: ../index.html");
        }

    }

?>
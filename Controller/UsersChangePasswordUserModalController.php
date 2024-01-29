<?php

    //Verify that the controller had been accessed through the view:
    if($_GET["status"]!="true"){
        
        session_destroy();
        header("location: ../index.html");

    }else{

        //Verify that user has logged in:
        session_start();
        if(!isset($_SESSION["userName"])){                   
            $msg = "Please login first";
            $msg = base64_encode($msg);
            header("location: ../View/Login.php?msg=$msg");
        }

        //Load data from view:
        $id = $_POST['Id'];
        $password = $_POST['NewPassword'];
        $rePassword = $_POST['RePassword'];

        //Load the database connection string and model:
        require_once "../Model/UsersChangePasswordUserModalModel.php";
        require_once '../Commons/JeevaniDB.php';

        //Create database connection object:
        $thisDBConnection = new DbConnection();
        $myCon = $thisDBConnection->con;

        //Change Password:
        if(emptyInputCheck($id, $password, $rePassword) !== true){
            throw new Exception(emptyInputCheck($id, $password, $rePassword));
        }

        if(passwordStrengthChecker($password) !== true){
            throw new Exception(passwordStrengthChecker($password));
        }

        if(passwordMatcher($password, $rePassword) !== true){
            throw new Exception("Passwords do not match!");
        }

        UpdatePassword($myCon, $id, $password);
        
    }


?>
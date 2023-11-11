<?php

    if($_GET["status"]!="true"){

        header("location: ../index.html");

    }else{
        
        $email = $_POST["email"];
        $nic = $_POST["nic"];
        $password = $_POST["new-password"];
        $repassword = $_POST["new-confirm-password"];

        try{
            
            require_once '../Commons/JeevaniDB.php';
            require_once '../Model/ForgotPasswordModalModel.php';

            $thisDBConnection = new DbConnection();
            $myCon = $thisDBConnection->con;

            if(emptyInputCheck($email, $nic, $password, $repassword) !== true){
                throw new Exception(emptyInputCheck($email, $nic, $password, $repassword));
            }

            if(nicValidator($nic) !== true){
                throw new Exception(nicValidator($nic));
            }

            if(passwordStrengthChecker($password) !== true){
                throw new Exception(passwordStrengthChecker($password));
            }

            if(passwordMatcher($password, $repassword) !== true){
                throw new Exception("Passwords do not match!");
            }

            UpdatePassword($myCon, $email, $nic, $password);

        }catch(exception $ex){

            $msg = $ex->getMessage();
            $msg = base64_encode($msg);

            header("location: ../View/Login.php?msg=$msg");

            exit();
        }

    }
    
?>
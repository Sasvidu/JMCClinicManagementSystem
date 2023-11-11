<?php

    //Verify that the controller had been accessed through the view:
    if($_GET["status"]!="true"){

        header("location: ../index.html");

    }else{

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["username"];
        $dobOG = $_POST["dateofbirth"];
        $nic = $_POST["nic"];
        $address = $_POST["address"];
        $password = $_POST["password"];
        $repassword = $_POST["rePassword"];
        
        $dobOG = strval($dobOG);
        $dob = date("Y-m-d", strtotime($dobOG));

        try{
            
            require_once '../Commons/JeevaniDB.php';
            require_once '../Model/SignUpModel.php';

            $thisDBConnection = new DbConnection();
            $myCon = $thisDBConnection->con;

            if(emptyInputCheck($firstname, $lastname, $email, $dobOG, $nic, $address, $password, $repassword) !== true){
                throw new Exception(emptyInputCheck($firstname, $lastname, $email, $dobOG, $nic, $address, $password, $repassword));
            }

            if(userExists($myCon, $email) !== false){
                throw new Exception("Sorry, this email adress is already taken by another user.");
            }

            if(nicValidator($nic) !== true){
                throw new Exception(nicValidator($nic));
            }

            if(nicExists($myCon, $nic) !== false){
                throw new Exception("Sorry, there is already a user with the same NIC. Please contact an admin to resolve the issue.");
            }

            if(passwordStrengthChecker($password) !== true){
                throw new Exception(passwordStrengthChecker($password));
            }

            if(passwordMatcher($password, $repassword) !== true){
                throw new Exception("Passwords do not match");
            }

            InsertUser($myCon, $firstname, $lastname, $email, $dob, $nic, $address, $password);

        }catch(exception $ex){

            $msg = $ex->getMessage();
            $msg = base64_encode($msg);

            header("location: ../View/SignUp.php?msg=$msg");

            exit();
        }

    }
    
?>
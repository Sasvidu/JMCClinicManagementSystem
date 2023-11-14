<?php

    //Verify that the controller had been accessed through the view:
    if(!isset($_GET["status"])){

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
        $firstname = $_POST["FirstName"];
        $lastname = $_POST["LastName"];
        $email = $_POST["Username"];
        $dobOG = $_POST["DateOfBirth"];
        $nic = $_POST["NIC"];
        $address = $_POST["Address"];
        $role = $_POST["Role"];
        $password = $_POST["Password"];

        $dobOG = strval($dobOG);
        $dob = date("Y-m-d", strtotime($dobOG));

        //Load the database connection string and model:
        require_once "../Model/UsersAddUserModalModel.php";
        require_once '../Commons/JeevaniDB.php';

        //Create database connection object:
        $thisDBConnection = new DbConnection();
        $myCon = $thisDBConnection->con;

        //Add the user to the database:
        try{
            
            require_once '../Commons/JeevaniDB.php';
            require_once '../Model/UsersAddUserModalModel.php';

            $thisDBConnection = new DbConnection();
            $myCon = $thisDBConnection->con;

            if(emptyInputCheck($firstname, $lastname, $email, $dobOG, $nic, $address, $role, $password) !== true){
                throw new Exception(emptyInputCheck($firstname, $lastname, $email, $dobOG, $nic, $address, $role, $password));
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

            InsertUser($myCon, $firstname, $lastname, $email, $dobOG, $nic, $address, $role, $password);

        }catch(exception $ex){

            $msg = $ex->getMessage();
            $msg = base64_encode($msg);

            header("location: ../View/Users.php?msg=$msg");

            exit();
        }
        /*
        if(productExists($myCon, $category, $brand, $name) !== false){
            $msg = "Product already exists";
            $msg = base64_encode($msg);
            header("location: ../View/Inventory.php?msg=$msg");
            exit();
        }
        */
        
    }


?>
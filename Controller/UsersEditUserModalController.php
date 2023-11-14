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
        $id = $_POST["Id"];
        $firstname = $_POST["FirstName"];
        $lastname = $_POST["LastName"];
        $email = $_POST["Username"];
        $dobOG = $_POST["DateOfBirth"];
        $nic = $_POST["NIC"];
        $address = $_POST["Address"];

        $dobOG = strval($dobOG);
        $dob = date("Y-m-d", strtotime($dobOG));

        //Load the database connection string and model:
        require_once "../Model/UsersEditUserModalModel.php";
        require_once '../Commons/JeevaniDB.php';

        //Create database connection object:
        $thisDBConnection = new DbConnection();
        $myCon = $thisDBConnection->con;

        //Add the user to the database:
        try{
            
            require_once '../Commons/JeevaniDB.php';
            require_once '../Model/UsersEditUserModalModel.php';

            $thisDBConnection = new DbConnection();
            $myCon = $thisDBConnection->con;

            if(emptyInputCheck($id, $firstname, $lastname, $email, $dobOG, $nic, $address) !== true){
                throw new Exception(emptyInputCheck($id, $firstname, $lastname, $email, $dobOG, $nic, $address, $role, $password));
            }

            if(nicValidator($nic) !== true){
                throw new Exception(nicValidator($nic));
            }

            if(nicExists($myCon, $email, $nic) !== true){
                throw new Exception("Sorry, there is already a user with the same NIC. Please contact an admin to resolve the issue.");
            }

            UpdateUser($myCon, $id, $firstname, $lastname, $email, $dobOG, $nic, $address);

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
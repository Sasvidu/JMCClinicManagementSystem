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
        $id = $_POST['Id'];
        $name = $_POST['Name'];
        $origin = $_POST['Origin'];
        $specialisation = $_POST['Specialisation'];

        //Load the database connection string and model:
        require_once "../Model/SuppliersEditSupplierModalModel.php";
        require_once '../Commons/JeevaniDB.php';

        //Create database connection object:
        $thisDBConnection = new DbConnection();
        $myCon = $thisDBConnection->con;

        //Add the medicine to the database:
        if(emptyInputCheck($id, $name, $origin, $specialisation) === true){
            UpdateSupplier($myCon, $id, $name, $origin, $specialisation);
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
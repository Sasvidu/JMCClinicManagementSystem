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
        $doctorId = $_POST['Id'];
        $userId = $_POST['UserId'];

        //Load the database connection string and model:
        require_once "../Model/DoctorsDeleteDoctorModalModel.php";
        require_once '../Commons/JeevaniDB.php';

        //Create database connection object:
        $thisDBConnection = new DbConnection();
        $myCon = $thisDBConnection->con;

        //Delete Doctor:
        DeleteDoctor($myCon, $doctorId, $userId);
        
    }


?>
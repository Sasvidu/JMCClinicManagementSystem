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
        $appointmentId = $_POST['Appointment'];
        $medicineId = $_POST['Medicine'];
        $qty = $_POST['Qty'];

        //Load the database connection string and model:
        require_once "../Model/PrescriptionAddPrescriptionModalModel.php";
        require_once '../Commons/JeevaniDB.php';

        //Create database connection object:
        $thisDBConnection = new DbConnection();
        $myCon = $thisDBConnection->con;

        //Add the Prescription to the database:
        if(emptyInputCheck($appointmentId, $medicineId, $qty) === true){
            InsertPrescription($myCon, $appointmentId, $medicineId, $qty);
        }

        
    }


?>
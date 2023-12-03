<?php

    if($_GET["status"]!="true"){

        session_destroy();
        header("location: ../index.html");

    }else{

        session_start();
        if(!isset($_SESSION["userName"])){                   
            $msg = "Please login first";
            $msg = base64_encode($msg);
            header("location: ../View/Login.php?msg=$msg");
        }

        $id = $_POST['Id'];

        require_once "../Model/PrescriptionDeletePrescriptionModalModel.php";
        require_once '../Commons/JeevaniDB.php';

        $thisDBConnection = new DbConnection();
        $myCon = $thisDBConnection->con;

        DeletePrescription($myCon, $id);
        
    }


?>
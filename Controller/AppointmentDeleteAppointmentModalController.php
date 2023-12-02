<?php

    if($_GET["status"]!="true"){

        session_destroy();
        header("location: ../index.html");

    }else{

        try{

            session_start();
            if(!isset($_SESSION["userName"])){                   
                $msg = "Please login first";
                $msg = base64_encode($msg);
                header("location: ../View/Login.php?msg=$msg");
            }

            $id = $_POST['Id'];

            require_once "../Model/AppointmentDeleteAppointmentModalModel.php";
            require_once '../Commons/JeevaniDB.php';
            
            $thisDBConnection = new DbConnection();
            $myCon = $thisDBConnection->con;

            DeleteAppointment($myCon, $id);

        }catch(exception $ex){

            $msg = $ex->getMessage();
            $msg = base64_encode($msg);

            header("location: ../View/Appointments.php?msg=$msg");

            exit();
        }
        
    }

?>
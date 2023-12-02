<?php

    //Verify that the controller had been accessed through the view:
    if($_GET["status"]!="true"){

        session_destroy();
        header("location: ../index.html");

    }else{

        //Get the Schedule data
        $dateOG = $_POST["Date"];
        $doctorId = $_POST["DoctorId"];
        $patientId = $_POST["PatientId"];
        
        $dateOG = strval($dateOG);
        $date = date("Y-m-d", strtotime($dateOG));

        try{
            
            require_once '../Commons/JeevaniDB.php';
            require_once '../Model/AppointmentAddAppointmentModalModel.php';

            $thisDBConnection = new DbConnection();
            $myCon = $thisDBConnection->con;

            if(emptyInputCheck($dateOG, $doctorId, $patientId) !== true){
                throw new Exception(emptyInputCheck($dateOG, $doctorId, $patientId));
            }

            if(timingValidator($myCon, $date, $doctorId)[0] !== true){
                throw new Exception(timingValidator($myCon, $date, $doctorId));
            }

            $scheduleId = timingValidator($myCon, $date, $doctorId)[1];
            $appointmentAvailableTime = timingValidator($myCon, $date, $doctorId)[2];
            $appointmentAvailableTime = date("H:i:s", $appointmentAvailableTime);
            $appointmentCompletedTime = timingValidator($myCon, $date, $doctorId)[3];
            $appointmentCompletedTime = date("H:i:s", $appointmentCompletedTime);

            InsertAppointment($myCon, $scheduleId, $patientId, $appointmentAvailableTime, $appointmentCompletedTime);

        }catch(exception $ex){

            $msg = $ex->getMessage();
            $msg = base64_encode($msg);

            header("location: ../View/Appointments.php?msg=$msg");

            exit();
        }

    }
    
?>
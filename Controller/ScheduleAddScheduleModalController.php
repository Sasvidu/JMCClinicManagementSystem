<?php

    //Verify that the controller had been accessed through the view:
    if($_GET["status"]!="true"){

        session_destroy();
        header("location: ../index.html");

    }else{

        //Get the Schedule data
        $dateOG = $_POST["Date"];
        $doctorId = $_POST["DoctorId"];
        $startTimeOG = $_POST["StartTime"];
        $endTimeOG = $_POST["EndTime"];
        
        $dateOG = strval($dateOG);
        $date = date("Y-m-d", strtotime($dateOG));

        $startTimeOG = strval($startTimeOG);
        $startTime = strtotime($startTimeOG);

        $endTimeOG = strval($endTimeOG);
        $endTime = strtotime($endTimeOG);

        try{
            
            require_once '../Commons/JeevaniDB.php';
            require_once '../Model/ScheduleAddScheduleModalModel.php';

            $thisDBConnection = new DbConnection();
            $myCon = $thisDBConnection->con;

            if(emptyInputCheck($dateOG, $doctorId, $startTime, $endTime) !== true){
                throw new Exception(emptyInputCheck($dateOG, $doctorId, $startTime, $endTime));
            }

            if(scheduleExists($myCon, $date, $doctorId) !== false){
                throw new Exception("A schedule has already been created this day for this doctor.");
            }

            if(timingValidator($startTime, $endTime) !== true){
                throw new Exception(timingValidator($startTime, $endTime));
            }

            InsertSchedule($myCon, $date, $doctorId, $startTimeOG, $endTimeOG);

        }catch(exception $ex){

            $msg = $ex->getMessage();
            $msg = base64_encode($msg);

            header("location: ../View/Schedules.php?msg=$msg");

            exit();
        }

    }
    
?>
<?php

    //Verify that the controller had been accessed through the view:
    if($_GET["status"]!="true"){

        session_destroy();
        header("location: ../index.html");

    }else{

        //Get the Schedule data
        $scheduleId = $_POST["Id"];
        $startTimeOG = $_POST["StartTime"];
        $endTimeOG = $_POST["EndTime"];

        $startTimeOG = strval($startTimeOG);
        $startTime = strtotime($startTimeOG);

        $endTimeOG = strval($endTimeOG);
        $endTime = strtotime($endTimeOG);

        try{
            
            require_once '../Commons/JeevaniDB.php';
            require_once '../Model/SchedulesEditScheduleModalModel.php';

            $thisDBConnection = new DbConnection();
            $myCon = $thisDBConnection->con;

            if(emptyInputCheck($scheduleId, $startTimeOG, $endTimeOG) !== true){
                throw new Exception(emptyInputCheck($scheduleId, $startTImeOG, $endTimeOG));
            }

            if(editingAllowed($myCon, $scheduleId, $startTime, $endTime) !== true){
                throw new Exception("The new timings for the schedule are not allowed, please try selecting the times such that there is no conflict with existing appointment bookings.");
            }

            if(timingValidator($startTime, $endTime) !== true){
                throw new Exception(timingValidator($startTime, $endTime));
            }

            echo "fine";

            UpdateSchedule($myCon, $scheduleId, $startTimeOG, $endTimeOG);

        }catch(exception $ex){

            $msg = $ex->getMessage();
            $msg = base64_encode($msg);

            header("location: ../View/Schedules.php?msg=$msg");

            exit();
        }

    }
    
?>
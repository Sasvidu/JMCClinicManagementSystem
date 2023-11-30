<?php

require_once '../Commons/JeevaniDB.php';

    function emptyInputCheck($scheduleId, $startTImeOG, $endTimeOG){

        if($scheduleId==""){
            return "Error loading schedule details.";
        }else if($startTImeOG==""){
            return "Starting time cannot be empty!";
        }else if($endTimeOG==""){
            return "Ending time cannot be empty!";
        }else{
            return true;
        }

    }

    function editingAllowed($con, $scheduleId, $startTIme, $endTime){
            
        $sql = "SELECT * FROM schedule WHERE schedule_id = ?;";

        //Prepared Statement:
        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Schedules.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $scheduleId);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $schedule = mysqli_fetch_assoc($resultData);
        $availableTime = $schedule["schedule_available_time"];
        $availableTime = strtotime($availableTime);
        $oldStartTime = $schedule["schedule_start_time"];
        $oldStartTime = strtotime($oldStartTime);

        mysqli_stmt_close($stmt);

        if($availableTime == $oldStartTime){
            //In case there are no appointments placed, let the times to be changed any way in accordance with the schedulee creation rules
            return true;
        }else if(($startTIme <= $oldStartTime) && ($availableTime <= $endTime)){
            //In case there are appointments placed, ensure that the new start time is earlier and the new end time is higher than the time of the last appointment
            return true;
        }else{
            return false;
        }

    }

    function timingValidator($startTime, $endTime){

        if($startTime < strtotime("08:00")){
            return "A schedule can only start after 08.00 AM.";
        }

        if($endTime > strtotime("14:00")){
            return "A schedule cannot exceed 14.00 PM.";
        }

        if($startTime >= $endTime){
            return "Starting time has to be lower than End time.";
        }

        return true;

    }

    function UpdateSchedule($con, $scheduleId, $startTIme, $endTime){

        //update Schedule Details
        $sql = "UPDATE `schedule` SET `schedule_start_time` = ?, `schedule_end_time` = ? WHERE `schedule_id` = ?;";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Schedules.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sss", $startTIme, $endTime, $scheduleId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $code = "Schedule Updated Successfully!";
        $code = base64_encode($code);
        header("location: ../View/Schedules.php?code=$code");

    }
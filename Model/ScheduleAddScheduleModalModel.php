<?php

require_once '../Commons/JeevaniDB.php';

    function emptyInputCheck($dateOG, $doctorId, $startTime, $endTime){

        if($dateOG==""){
            return "Date cannot be empty!";
        }else if($doctorId=="Unspecified"){
            return "Please specify a doctor!";
        }else if($startTime==""){
            return "Starting time cannot be empty!";
        }else if($endTime==""){
            return "Ending time cannot be empty!";
        }else{
            return true;
        }

    }

    function scheduleExists($con, $date, $doctorId){
            
        //User name === User email
        $sql = "SELECT * FROM schedule WHERE schedule_date = ? AND schedule_doctor_id = ?;";

        //Prepared Statement:
        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Schedules.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $date, $doctorId);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);

    }

    function timingValidator($startTime, $endTime){

        if($startTime < strtotime("08:00")){
            return "A schedule can only start after 08.00 AM.";
        }

        if($endTime > strtotime("14:00")){
            return "A schedule cannot exceed 14.00 PM.";
        }

        if($startTime > $endTime){
            return "Starting time has to be lower than End time.";
        }

        return true;

    }

    function InsertSchedule($con, $date, $doctorId, $startTime, $endTime){

        //Insert Doctor's User Account0
        $sql = "INSERT INTO `schedule`(`schedule_date`, `schedule_doctor_id`, `schedule_start_time`, `schedule_end_time`, `schedule_available_time`) VALUES (?, ?, ?, ?, ?);";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement 1 Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Schedules.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sssss", $date, $doctorId, $startTime, $endTime, $startTime);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $code = "Schedule Created Successfully!";
        $code = base64_encode($code);
        header("location: ../View/Schedules.php?code=$code");

    }
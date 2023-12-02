<?php

require_once '../Commons/JeevaniDB.php';

    function emptyInputCheck($dateOG, $doctorId, $patientId){

        if($dateOG==""){
            return "Date cannot be empty!";
        }else if($doctorId=="Unspecified"){
            return "Please specify a doctor!";
        }else if($patientId==""){
            return "Please specify a patient!";
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

    function timingValidator($con, $date, $doctorId){

        if(scheduleExists($con, $date, $doctorId) === false){
            return "A schedule hasn't been created for the given date and doctor. Please create a schedule before making appointments.";
        }

        $schedule = scheduleExists($con, $date, $doctorId);
        $appointmentAvailableTime = $schedule['schedule_available_time'];
        $appointmentAvailableTime = strtotime($appointmentAvailableTime);
        $appointmentCompletedTime =  $appointmentAvailableTime + 600; //10 minutes in seconds
        $scheduleEndTime = $schedule['schedule_end_time'];
        $scheduleEndTime = strtotime($scheduleEndTime);

        if($appointmentCompletedTime > $scheduleEndTime){
            return "Sorry, all time slots for the selected date and doctor have been occupied.";
        }

        return [true, $schedule['schedule_id'], $appointmentAvailableTime, $appointmentCompletedTime];

    }

    function InsertAppointment($con, $scheduleId, $patientId, $appointmentAvailableTime, $appointmentCompletedTime){

        //Insert Appointment into the table
        $sql = "INSERT INTO `appointment`(`appointment_schedule_id`, `appointment_patient_id`, `appointment_time`) VALUES (?, ?, ?);";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Appointments.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sss", $scheduleId, $patientId, $appointmentAvailableTime);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        //Update the available time on the schedules table
        $sqla = "UPDATE `schedule` SET `schedule_available_time` = ? WHERE `schedule_id` = ?;";

        $stmta = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmta, $sqla)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Appointments.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmta, "ss", $appointmentCompletedTime, $scheduleId);
        mysqli_stmt_execute($stmta);
        mysqli_stmt_close($stmta);

        $code = "Schedule Created Successfully!";
        $code = base64_encode($code);
        header("location: ../View/Appointments.php?code=$code");

    }
<?php

require_once '../Commons/JeevaniDB.php';

    function deletingAllowed($con, $scheduleId){
                
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
        $startTime = $schedule["schedule_start_time"];
        $startTime = strtotime($startTime);

        mysqli_stmt_close($stmt);

        if($availableTime == $startTime){
            //In case there are no appointments placed, let the times to be changed any way in accordance with the schedulee creation rules
            return true;
        }else{
            return false;
        }

    }

    function DeleteSchedule($con, $id){

        $sql = "UPDATE schedule SET schedule_status = 0 WHERE schedule_id = ?";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Schedules.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $code = "Schedule deleted successfully!";
        $code = base64_encode($code);
        header("location: ../View/Schedule.php?msg=$code");

    }

?>

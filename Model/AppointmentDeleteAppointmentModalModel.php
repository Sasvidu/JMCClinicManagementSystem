<?php

require_once '../Commons/JeevaniDB.php';

    function scheduleExists($con, $id){
                
        //User name === User email
        $sql = "SELECT * FROM schedule WHERE schedule_id = ? AND schedule_status = 1;";

        //Prepared Statement:
        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Appointments.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $id);
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

    function appointmentExists($con, $id){
                
        //User name === User email
        $sql = "SELECT * FROM appointment WHERE appointment_id = ? AND appointment_status = 1;";

        //Prepared Statement:
        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Appointments.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $id);
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

    function DeleteAppointment($con, $id){   

        $sql = "UPDATE appointment SET appointment_status = 0 WHERE appointment_id = ?";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Appointments.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $code = "Appointment deleted successfully!";
        $code = base64_encode($code);
        header("location: ../View/Appointments.php?msg=$code");

    }

?>

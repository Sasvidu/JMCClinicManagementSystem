<?php

require_once '../Commons/JeevaniDB.php';

    function DeleteDoctor($con, $doctorId, $userId){

        $sql = "UPDATE doctor SET doctor_status = 0 WHERE doctor_id = ?";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Doctors.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $doctorId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $sqla = "UPDATE user SET user_status= 0 WHERE user_id = ?";

        $stmta = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmta, $sqla)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Doctors.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmta, "s", $userId);
        mysqli_stmt_execute($stmta);
        mysqli_stmt_close($stmta);

        $code = "Doctor deleted successfully!";
        $code = base64_encode($code);
        header("location: ../View/Doctors.php?msg=$code");

    }


?>

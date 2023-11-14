<?php

require_once '../Commons/JeevaniDB.php';

    function userExists($con, $Id){
                
        $sql = "SELECT * FROM user WHERE user_id = ?;";

        //Prepared Statement:
        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Users.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $Id);
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

    function DeleteUser($con, $Id){

        $user = userExists($con, $Id);
        $role = $user['user_role_id'];

        if($role === 2 || $role === 4){
            $userAttachedId = $user['user_attached_info_id'];
        }

        $sql = "UPDATE user SET user_status = 0 WHERE user_id = ?";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement 1 Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Users.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $Id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if($role === 4){

            $sqla = "UPDATE medicalinfo SET medicalinfo_status = 0 WHERE medicalinfo_id = ?";

            $stmta = mysqli_stmt_init($con);  
    
            if(!mysqli_stmt_prepare($stmta, $sqla)){
                $msg = "Error: MySQL statement 2 Failed";
                $msg = base64_encode($msg);
                header("location: ../View/Users.php?msg=$msg");
                exit();
            }
    
            mysqli_stmt_bind_param($stmta, "i", $userAttachedId);
            mysqli_stmt_execute($stmta);
            mysqli_stmt_close($stmta);

        }else if($role === 2){

            $sqla = "UPDATE doctor SET doctor_status = 0 WHERE doctor_id = ?";

            $stmta = mysqli_stmt_init($con);  
    
            if(!mysqli_stmt_prepare($stmta, $sqla)){
                $msg = "Error: MySQL statement 2 Failed";
                $msg = base64_encode($msg);
                header("location: ../View/Users.php?msg=$msg");
                exit();
            }
    
            mysqli_stmt_bind_param($stmta, "i", $userAttachedId);
            mysqli_stmt_execute($stmta);
            mysqli_stmt_close($stmta);

        }

        $code = "User deleted successfully!";
        $code = base64_encode($code);
        header("location: ../View/Users.php?msg=$code");

    }


?>

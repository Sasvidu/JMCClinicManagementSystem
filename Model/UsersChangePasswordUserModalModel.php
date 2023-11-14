<?php

require_once '../Commons/JeevaniDB.php';

    function emptyInputCheck($id, $password, $rePassword){

        if($id==""){
            return "Error loading user data!";
        }else if($password==""){
            return "Password cannot be empty!";
        }else if($rePassword==""){
            return "Repeated password cannot be empty!";
        }else{
            return true;
        }

    }

    function userExists($con, $id){
            
        $sql = "SELECT * FROM user WHERE user_id = ?;";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Users.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $id);
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

    function passwordStrengthChecker($password){

        $length = strlen($password);
        if($length <= 5){
            return "Please make sure the password is longer than 5 characters.";
        }

        $isThereNumber = false;
        for ($i = 0; $i < $length; $i++) {
            if ( ctype_digit($password[$i]) ) {
            $isThereNumber = true;
            break;
            }
        }

        if($isThereNumber == false){
            return "Please include at least one number in your password.";
        }

        return true;
    }

    function passwordMatcher($password, $rePassword){

        if($password === $rePassword){
            return true;
        }else{
            return false;
        }

    }

    function UpdatePassword($con, $id, $password){

        $userExists = userExists($con, $id);

        if($userExists == false){
            $msg = "Error loading user data!";
            $msg = base64_encode($msg);
            header("location: ../View/Users.php?msg=$msg");
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE user SET user_password = ? WHERE user_id = ?;";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Users.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "si", $hashedPassword, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $code = "Password Updated Successfully";
        $code = base64_encode($code);
        header("location: ../View/Login.php?code=$code");

    }

?>

<?php

require_once '../Commons/JeevaniDB.php';

    function emptyInputCheck($id, $fname, $lname, $email, $dob, $nic, $address){

        if($id==""){
            return "Error loading user details!";
        }else if($fname==""){
            return "First name cannot be empty!";
        }else if($lname==""){
            return "Last name cannot be empty!";
        }else if($email==""){
            return "Email cannot be empty!";
        }else if($dob==""){
            return "Date of Birth cannot be empty!";
        }else if($address==""){
            return "Address cannot be empty!";
        }else if($nic==""){
            return "NIC cannot be empty!";
        }else{
            return true;
        }

    }

    function userExists($con, $username){
            
        //User name === User email
        $sql = "SELECT * FROM user WHERE user_email = ?;";

        //Prepared Statement:
        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/SignUp.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $username);
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

    function nicValidator($nic){

        $length = strlen($nic);

        if($length==10){

            for ($i = 0; $i < $length-1; $i++) {
                if ( !ctype_digit($nic[$i]) ) {
                    return "Invalid NIC number.";
                }
            }

            if($nic[9]!="V"){
                return "Invalid NIC number.";
            }

            return true;

        }else if($length == 12){

            if ( !ctype_digit($nic) ){
                return "Invalid NIC number.";
            }

            return true;

        }else{

            return "Invalid NIC number.";

        }

    }

    function nicExists($con, $email, $nic){

        $user = userExists($con, $email);
        $currentNIC = $user['user_nic'];

        if($currentNIC === $nic){

            return true;

        }else{
            $sqla = "SELECT * FROM user WHERE user_nic = ?;";

            $stmta = mysqli_stmt_init($con);  
    
            if(!mysqli_stmt_prepare($stmta, $sqla)){
                $msg = "Error: MySQL statement Failed";
                $msg = base64_encode($msg);
                header("location: ../View/Doctors.php?msg=$msg");
                exit();
            }
    
            mysqli_stmt_bind_param($stmta, "s", $nic);
            mysqli_stmt_execute($stmta);
    
            $resultData = mysqli_stmt_get_result($stmta);

            if($row = mysqli_fetch_assoc($resultData)){
                return false;
            }else{
                return true;
            }

            mysqli_stmt_close($stmta);
        }

    }

    function UpdateUser($con, $id, $fname, $lname, $email, $dob, $nic, $address){

        $sql = "UPDATE `user` SET `user_fname`= ?, `user_lname`= ?, `user_address`= ?, `user_dob`= ?, `user_email`= ?, `user_nic`= ? WHERE user_id = ?;";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/SignUp.php?msg=$msg");
            exit();
        }


        mysqli_stmt_bind_param($stmt, "ssssssi", $fname, $lname, $address, $dob, $email, $nic, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $code = "User Updated Successfully!";
        $code = base64_encode($code);
        header("location: ../View/Users.php?code=$code");

    }
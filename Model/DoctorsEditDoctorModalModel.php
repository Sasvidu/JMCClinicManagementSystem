<?php

require_once '../Commons/JeevaniDB.php';

    function emptyInputCheck($doctorId, $userId, $fname, $lname, $email, $dob, $nic, $address, $specialisation, $qualifications, $experience, $telNo){

        if($doctorId==""){
            return "Error loading doctor's details!";
        }else if($userId==""){
            return "Error loading doctor's account!";
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
        }else if($specialisation==""){
            return "Specialisation cannot be empty!";
        }else if($qualifications==""){
            return "Qualifications cannot be empty!";
        }else if($experience==""){
            return "Experience cannot be empty!";
        }else if($telNo==""){
            return "Telephone number cannot be empty!";
        }else{
            return true;
        }

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

    function userExists($con, $username){
            
        //User name === User email
        $sql = "SELECT * FROM user WHERE user_email = ?;";

        //Prepared Statement:
        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Doctors.php?msg=$msg");
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
                //$msg = base64_encode($msg);
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

    function UpdateDoctor($con, $doctorId, $userId, $fname, $lname, $dob, $nic, $address, $specialisation, $qualifications, $experience, $telNo){

        //Update Doctor's Data
        $sql = "UPDATE `doctor` SET `doctor_specialisation`= ?, `doctor_qualifications`= ?, `doctor_experience`= ?, `doctor_tel_no`= ? WHERE `doctor_id` = ?;";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement 1 Failed";
            //$msg = base64_encode($msg);
            header("location: ../View/Doctors.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssssi", $specialisation, $qualifications, $experience, $telNo, $doctorId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        //Insert Doctor's User Account Data
        $sqla = "UPDATE `user` SET `user_fname`= ?, `user_lname`= ?, `user_address`= ?, `user_dob`= ?, `user_nic`= ? WHERE `user_id` = ?;";

        $stmta = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmta, $sqla)){
            $msg = "Error: MySQL statement 2 Failed";
           // $msg = base64_encode($msg);
            header("location: ../View/Doctors.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmta, "sssssi", $fname, $lname, $address, $dob, $nic, $userId);
        mysqli_stmt_execute($stmta);
        mysqli_stmt_close($stmta);

        $code = "Doctor Updated Successfully!";
        $code = base64_encode($code);
        header("location: ../View/Doctors.php?code=$code");

    }
<?php

require_once '../Commons/JeevaniDB.php';

    function emptyInputCheck($fname, $lname, $email, $dob, $nic, $address, $password, $specialisation, $qualifications, $experience, $telNo){

        if($fname==""){
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
        }else if($password==""){
            return "Password cannot be empty!";
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

    function nicExists($con, $nic){

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
            return $row;
        }else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmta);

    }

    function passwordStrengthChecker($password){

        $length = strlen($password);
        if($length <= 5){
            return "Please make sure the password is longer than 5 characters";
        }

        $isThereNumber = false;
        for ($i = 0; $i < $length; $i++) {
            if ( ctype_digit($password[$i]) ) {
            $isThereNumber = true;
            break;
            }
        }

        if($isThereNumber == false){
            return "Please include at least one number in your password";
        }

        return true;
    }

    function InsertDoctor($con, $fname, $lname, $email, $dob, $nic, $address, $password, $specialisation, $qualifications, $experience, $telNo){

        //Insert Doctor's User Account
        $sql = "INSERT INTO `user`(`user_fname`, `user_lname`, `user_address`, `user_dob`, `user_email`, `user_nic`, `user_password`, `user_role_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement 1 Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Doctors.php?msg=$msg");
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $roleNo = 2;

        mysqli_stmt_bind_param($stmt, "sssssssi", $fname, $lname, $address, $dob, $email, $nic, $hashedPassword, $roleNo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $userId = mysqli_insert_id($con);

        //Insert Doctor Data
        $sqla = "INSERT INTO `doctor`(`doctor_specialisation`, `doctor_qualifications`, `doctor_experience`, `doctor_tel_no`, `doctor_user_id`) VALUES (?, ?, ?, ?, ?);";

        $stmta = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmta, $sqla)){
            $msg = "Error: MySQL statement 2 Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Doctors.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmta, "ssssi", $specialisation, $qualifications, $experience, $telNo, $userId);
        mysqli_stmt_execute($stmta);
        mysqli_stmt_close($stmta);

        $doctorId = mysqli_insert_id($con);

        //Update User Attached Info:
        $sqlb = "UPDATE `user` SET `user_attached_info_id`= ? WHERE `user_id` = ?;";

        $stmtb = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmtb, $sqlb)){
            $msg = "Error: MySQL statement 2 Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Doctors.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmtb, "ii", $doctorId, $userId);
        mysqli_stmt_execute($stmtb);
        mysqli_stmt_close($stmtb);

        $code = "Doctor Created Successfully!";
        $code = base64_encode($code);
        header("location: ../View/Doctors.php?code=$code");

    }
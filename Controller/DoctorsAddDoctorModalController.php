<?php

    //Verify that the controller had been accessed through the view:
    if($_GET["status"]!="true"){

        session_destroy();
        header("location: ../index.html");

    }else{

        //Get the User table data
        $firstname = $_POST["FirstName"];
        $lastname = $_POST["LastName"];
        $email = $_POST["Username"];
        $dobOG = $_POST["DateOfBirth"];
        $nic = $_POST["NIC"];
        $address = $_POST["Address"];
        $password = $_POST["Password"];
        
        $dobOG = strval($dobOG);
        $dob = date("Y-m-d", strtotime($dobOG));

        //Get the doctor table date
        $specialisation = $_POST["Specialisation"];
        $qualifications = $_POST["Qualifications"];
        $experience = $_POST["Experience"];
        $telNo = $_POST["TelNo"];

        try{
            
            require_once '../Commons/JeevaniDB.php';
            require_once '../Model/DoctorsAddDoctorModalModel.php';

            $thisDBConnection = new DbConnection();
            $myCon = $thisDBConnection->con;

            if(emptyInputCheck($firstname, $lastname, $email, $dob, $nic, $address, $password, $specialisation, $qualifications, $experience, $telNo) !== true){
                throw new Exception(emptyInputCheck($firstname, $lastname, $email, $dob, $nic, $address, $password, $specialisation, $qualifications, $experience, $telNo));
            }

            if(userExists($myCon, $email) !== false){
                throw new Exception("Sorry, this email adress is already taken by another user.");
            }

            if(nicValidator($nic) !== true){
                throw new Exception(nicValidator($nic));
            }

            if(nicExists($myCon, $nic) !== false){
                throw new Exception("Sorry, there is already a user with the same NIC. Please contact an admin to resolve the issue.");
            }

            if(passwordStrengthChecker($password) !== true){
                throw new Exception(passwordStrengthChecker($password));
            }

            InsertDoctor($myCon, $firstname, $lastname, $email, $dob, $nic, $address, $password, $specialisation, $qualifications, $experience, $telNo);

        }catch(exception $ex){

            $msg = $ex->getMessage();
            $msg = base64_encode($msg);

            header("location: ../View/Doctors.php?msg=$msg");

            exit();
        }

    }
    
?>
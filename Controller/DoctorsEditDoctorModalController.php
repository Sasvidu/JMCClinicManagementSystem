<?php

    //Verify that the controller had been accessed through the view:
    if($_GET["status"]!="true"){

        session_destroy();
        header("location: ../index.html");

    }else{

        //Get the User table data
        $doctorId = $_POST["DoctorId"];
        $firstname = $_POST["FirstName"];
        $lastname = $_POST["LastName"];
        $email = $_POST["Email"];
        $dobOG = $_POST["DateOfBirth"];
        $nic = $_POST["NIC"];
        $address = $_POST["Address"];
        
        $dobOG = strval($dobOG);
        $dob = date("Y-m-d", strtotime($dobOG));

        //Get the doctor table date
        $userId = $_POST["UserId"];
        $specialisation = $_POST["Specialisation"];
        $qualifications = $_POST["Qualifications"];
        $experience = $_POST["Experience"];
        $telNo = $_POST["TelNo"];

        try{
            
            require_once '../Commons/JeevaniDB.php';
            require_once '../Model/DoctorsEditDoctorModalModel.php';

            $thisDBConnection = new DbConnection();
            $myCon = $thisDBConnection->con;

            if(emptyInputCheck($doctorId, $userId, $firstname, $lastname, $email, $dob, $nic, $address, $specialisation, $qualifications, $experience, $telNo) !== true){
                throw new Exception(emptyInputCheck($doctorId, $userId, $firstname, $lastname, $email, $dob, $nic, $address, $specialisation, $qualifications, $experience, $telNo));
            }

            if(nicValidator($nic) !== true){
                throw new Exception(nicValidator($nic));
            }

            if(nicExists($myCon, $email, $nic) !== true){
                throw new Exception("Sorry, there is already a user with the same NIC. Please contact an admin to resolve the issue.");
            }

            UpdateDoctor($myCon, $doctorId, $userId, $firstname, $lastname, $dob, $nic, $address, $specialisation, $qualifications, $experience, $telNo);

        }catch(exception $ex){

            $msg = $ex->getMessage();
            //$msg = base64_encode($msg);

            header("location: ../View/Doctors.php?msg=$msg");

            exit();
        }

    }
    
?>
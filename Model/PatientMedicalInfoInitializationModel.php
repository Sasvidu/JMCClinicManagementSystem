<?php

require_once "../Commons/JeevaniDB.php";
$thisDBConnection = new DbConnection();
$myCon = $thisDBConnection->con;

function getUser($id){

    global $myCon;
    
    //Prepare and Execute SQL statement:
    $sql = "SELECT * FROM user WHERE user_id = ?;";

    $stmt = mysqli_stmt_init($myCon);  

    if(!mysqli_stmt_prepare($stmt, $sql)){
        $msg = "Error: MySQL statement Failed";
        $msg = base64_encode($msg);
        echo "<script>window.location.href='../View/PatientMedicalInfo.php?msg=$msg';</script>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $userDetails = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    return $userDetails;

}

function getPatientData($id){
    
    global $myCon;

    //Prepare and Execute SQL statement:
    $sql = "SELECT * FROM patientdata WHERE patientdata_id = ?;";

    $stmt = mysqli_stmt_init($myCon);  

    if(!mysqli_stmt_prepare($stmt, $sql)){
        $msg = "Error: MySQL statement Failed";
        $msg = base64_encode($msg);
        echo "<script>window.location.href='../View/PatientMedicalInfo.php?msg=$msg';</script>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $patientData = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    return $patientData;

}


<?php

// Verify that the controller had been accessed through the view:
if (!isset($_GET["status"])) {
    session_destroy();
    header("location: ../index.html");
} else {
    // Verify that the user has logged in:
    session_start();
    if (!isset($_SESSION["userName"])) {
        $msg = "Please login first";
        $msg = base64_encode($msg);
        header("location: ../View/Login.php?msg=$msg");
    }

    // Load data from the view:
    $userId = $_POST['userId'];
    $patientDataId = $_POST['patientDataId'];
    $patientDataExists = $_POST['patientDataExists'];
    $bloodGroup = $_POST['bloodGroup'];
    $allergies = $_POST['allergies'];
    $heartDisease = $_POST['heartDisease'];
    $highBloodPressure = $_POST['highBloodPressure'];
    $accident = $_POST['accident'];
    $diabetes = $_POST['diabetes'];
    $surgery = $_POST['surgery'];
    $cholesterol = $_POST['cholesterol'];
    $description = $_POST['description'];
    $familyHistory = $_POST['familyHistory'];

    // Load the database connection string and model:
    require_once "../Model/PatientMedicalInfoModel.php";
    require_once '../Commons/JeevaniDB.php';

    // Create database connection object:
    $dbConnection = new DbConnection();
    $myCon = $dbConnection->con;

    // Update the medical information in the database:
    if (emptyInputCheck($patientDataId, $bloodGroup, $allergies, $heartDisease, $highBloodPressure, $accident, $diabetes, $surgery, $cholesterol, $description, $familyHistory)) {
        if($patientDataExists){
            updateMedicalInfo($myCon, $userId, $patientDataId, $bloodGroup, $allergies, $heartDisease, $highBloodPressure, $accident, $diabetes, $surgery, $cholesterol, $description, $familyHistory);
        }else{
            addMedicalInfo($myCon, $userId, $bloodGroup, $allergies, $heartDisease, $highBloodPressure, $accident, $diabetes, $surgery, $cholesterol, $description, $familyHistory);
        }
    }
}

?>

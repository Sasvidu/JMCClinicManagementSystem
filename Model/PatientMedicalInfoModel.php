<?php

require_once '../Commons/JeevaniDB.php';

    //Check for empty input:
    function emptyInputCheck($patientDataId, $bloodGroup, $allergies, $heartDisease, $highBloodPressure, $accident, $diabetes, $surgery, $cholesterol, $description, $familyHistory)
    {
        if (empty($patientDataId) || empty($bloodGroup) || empty($allergies) || empty($heartDisease) || empty($highBloodPressure) || 
            empty($accident) || empty($diabetes) || empty($surgery) || empty($cholesterol) || empty($description) || empty($familyHistory)) {
            return true; 
        } else {
            return false;
        }
    }
    //Edit the product:
    function UpdateMedicalInfo($con, $userId, $patientDataId, $bloodGroup, $allergies, $heartDisease, $highBloodPressure, $accident, $diabetes, $surgery, $cholesterol, $description, $familyHistory){

        //Prepare and Execute SQL statement:
        $sql = "UPDATE patientdata SET patientdata_bloodGroup=?, patientdata_allergies= ?, patientdata_heartDisease=?, patientdata_highBloodPressure=?, patientdata_accident=?, patientdata_diabetes=?, patientdata_surgery=?, patientdata_cholesterol=?, patientdata_description= ?, patientdata_history= ? WHERE patientdata_id = ?;";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/PatientMedicalInfo.php?id=$userId&msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssiiiiiissi", $bloodGroup, $allergies, $heartDisease, $highBloodPressure, $accident, $diabetes, $surgery, $cholesterol, $description, $familyHistory, $patientDataId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        //Send success message ot the inventory page:
        $code = "Patient medical information updated successfully!";
        $code = base64_encode($code);
        header("location: ../View/PatientMedicalInfo.php?id=$userId&msg=$code");

    }

    function addMedicalInfo($myCon, $userId, $bloodGroup, $allergies, $heartDisease, $highBloodPressure, $accident, $diabetes, $surgery, $cholesterol, $description, $familyHistory) {

        // Prepare and Execute SQL statement to insert new medical information:
        $insertSql = "INSERT INTO patientdata (patientdata_bloodGroup, patientdata_allergies, patientdata_heartDisease, patientdata_highBloodPressure, patientdata_accident, patientdata_diabetes, patientdata_surgery, patientdata_cholesterol, patientdata_description, patientdata_history) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        $stmtInsert = mysqli_stmt_init($myCon);
    
        if (!mysqli_stmt_prepare($stmtInsert, $insertSql)) {
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/PatientMedicalInfo.php?id=$userId&msg=$msg");
            exit();
        }
    
        mysqli_stmt_bind_param($stmtInsert, "ssiiiiiiss", $bloodGroup, $allergies, $heartDisease, $highBloodPressure, $accident, $diabetes, $surgery, $cholesterol, $description, $familyHistory);
        $successInsert = mysqli_stmt_execute($stmtInsert);
    
        if (!$successInsert) {
            $msg = "Error: Failed to add patient medical information";
            $msg = base64_encode($msg);
            header("location: ../View/PatientMedicalInfo.php?id=$userId&msg=$msg");
            exit();
        }
    
        // Get the ID of the newly inserted medical information record:
        $newMedicalInfoId = mysqli_insert_id($myCon);
    
        mysqli_stmt_close($stmtInsert);
    
        // Update the patient's user_attached_info_id with the new medical information record ID:
        $updateSql = "UPDATE user SET user_attached_info_id = ? WHERE user_id = ?";
    
        $stmtUpdate = mysqli_stmt_init($myCon);
    
        if (!mysqli_stmt_prepare($stmtUpdate, $updateSql)) {
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/PatientMedicalInfo.php?id=$userId&msg=$msg");
            exit();
        }
    
        mysqli_stmt_bind_param($stmtUpdate, "ii", $newMedicalInfoId, $userId);
        $successUpdate = mysqli_stmt_execute($stmtUpdate);
    
        if (!$successUpdate) {
            $msg = "Error: Failed to update patient information with new medical record";
            $msg = base64_encode($msg);
            header("location: ../View/PatientMedicalInfo.php?id=$userId&msg=$msg");
            exit();
        }
    
        mysqli_stmt_close($stmtUpdate);
    
        // Send success message to the patient's medical information page:
        $code = "Patient medical information added successfully!";
        $code = base64_encode($code);
        header("location: ../View/PatientMedicalInfo.php?id=$userId&msg=$code");
    }
    




<?php

require_once '../Commons/JeevaniDB.php';

function prescriptionExists($con, $prescriptionId)
{
    $sql = "SELECT * FROM prescription WHERE prescription_id = ?;";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        handleStatementError();
    }

    mysqli_stmt_bind_param($stmt, "s", $prescriptionId);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function doctorExists($con, $doctorId)
{
    $sql = "SELECT * FROM doctor JOIN user ON doctor.doctor_user_id = user.user_id WHERE doctor_id = ?;";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        handleStatementError();
    }

    mysqli_stmt_bind_param($stmt, "s", $doctorId);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function userExists($con, $userId)
{
    $sql = "SELECT * FROM user WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        handleStatementError();
    }

    mysqli_stmt_bind_param($stmt, "s", $userId);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function medicineExists($con, $medicineId)
{
    $sql = "SELECT * FROM medicine WHERE medicine_id = ?;";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        handleStatementError();
    }

    mysqli_stmt_bind_param($stmt, "s", $medicineId);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function appointmentExists($con, $appointmentId)
{
    $sql = 
        "SELECT 
            appointment.*,
            schedule.*,
            doctor.*,
            patient_user.user_fname AS patient_fname,
            doctor_user.user_fname AS doctor_fname,
            patient_user.user_lname AS patient_lname,
            doctor_user.user_lname AS doctor_lname,
            patient_user.user_id AS patient_id
        FROM 
            appointment
        JOIN 
            schedule ON appointment.appointment_schedule_id = schedule.schedule_id
        JOIN 
            doctor ON schedule.schedule_doctor_id = doctor.doctor_id
        JOIN 
            user AS patient_user ON appointment.appointment_patient_id = patient_user.user_id
        JOIN 
            user AS doctor_user ON doctor.doctor_user_id = doctor_user.user_id
        WHERE
            appointment_id = ?
        AND 
            appointment_status = 1;
        ";

    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        handleStatementError();
    }

    mysqli_stmt_bind_param($stmt, "s", $appointmentId);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function handleStatementError() {
    global $userRole;

    $msg = "Error: MySQL statement Failed";
    $msg = base64_encode($msg);
    
    if($userRole == "Doctor"){
        header("location: ../View/DoctorAppointments.php?msg=$msg");
    }else if($userRole == "Patient"){
        header("location: ../View/PatientAppointments.php?msg=$msg");
    }else{
        header("location: ../View/Prescriptions.php?msg=$msg");
    }

    exit();
}

<?php

require_once "../Commons/JeevaniDB.php";
$thisDBConnection = new DbConnection();
$myCon = $thisDBConnection->con;


//Cards Data:
function getPatientAppointmentsCountToday($patientId) {
    global $myCon;

    $today = date("Y-m-d");
    $sql = "SELECT count(appointment_id) AS appointment_count FROM appointment 
            INNER JOIN schedule ON appointment.appointment_schedule_id = schedule.schedule_id
            WHERE appointment.appointment_patient_id = ? 
            AND DATE(schedule.schedule_date) = ? 
            AND appointment.appointment_status = 1;";

    $stmt = mysqli_stmt_init($myCon);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $msg = "Error: MySQL statement Failed";
        echo '<script>alert("' . $msg . '");</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmt, "is", $patientId, $today);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    return $row['appointment_count'];
}

function getPatientUpcomingAppointmentsCount($patientId) {
    global $myCon;

    $today = date("Y-m-d");
    $sql = "SELECT COUNT(appointment_id) AS appointment_count 
            FROM appointment 
            INNER JOIN schedule ON appointment.appointment_schedule_id = schedule.schedule_id
            WHERE appointment.appointment_patient_id = ? 
            AND DATE(schedule.schedule_date) >= ? 
            AND appointment.appointment_status = 1;";

    $stmt = mysqli_stmt_init($myCon);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $msg = "Error: MySQL statement Failed";
        echo '<script>alert("' . $msg . '");</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmt, "is", $patientId, $today);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    return $row['appointment_count'];
}

function getPatientUpcomingAppointments($patientId) {
    global $myCon;

    // Get current date and time
    $currentTime = date("H:i:s");
    $currentDate = date("Y-m-d");

    // SQL query to select upcoming appointments with patient details
    $sql = "SELECT appointment.*, 
                   schedule.schedule_date, 
                   schedule.schedule_start_time, 
                   patient.user_fname AS patient_fname, 
                   patient.user_lname AS patient_lname,
                   doctorUser.user_fname AS doctor_fname,
                   doctorUser.user_lname AS doctor_lname
            FROM appointment
            INNER JOIN schedule ON appointment.appointment_schedule_id = schedule.schedule_id
            INNER JOIN doctor ON schedule.schedule_doctor_id = doctor.doctor_id
            INNER JOIN user AS patient ON appointment.appointment_patient_id = patient.user_id
            INNER JOIN user AS doctorUser ON doctor.doctor_user_id = doctorUser.user_id
            WHERE appointment.appointment_patient_id = ? 
            AND ((DATE(schedule.schedule_date) = ? AND schedule.schedule_start_time > ?) 
            OR DATE(schedule.schedule_date) > ?)
            AND appointment.appointment_status = 1
            ORDER BY schedule.schedule_date, schedule.schedule_start_time;";

    $stmt = mysqli_stmt_init($myCon);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $msg = "Error: MySQL statement Failed";
        echo '<script>alert("' . $msg . '");</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmt, "isss", $patientId, $currentDate, $currentTime, $currentDate);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $appointments = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row;
    }

    mysqli_stmt_close($stmt);

    return $appointments;
}

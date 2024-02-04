<?php

require_once "../Commons/JeevaniDB.php";
$thisDBConnection = new DbConnection();
$myCon = $thisDBConnection->con;


//Cards Data:
function getMedicineCount() {
    global $myCon;
    $sql = "SELECT count(medicine_id) AS medicine_count FROM medicine WHERE medicine_status=1;";
    
    $result = mysqli_query($myCon, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['medicine_count'];
}

function getDoctorInfoByUserId($userId) {
    global $myCon;

    $sql = "SELECT * FROM doctor WHERE doctor_user_id = ? AND doctor_status = 1;";
    $stmt = mysqli_stmt_init($myCon);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $msg = "Error: MySQL statement Failed";
        echo '<script>alert("' . $msg . '");</script>';
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        mysqli_stmt_close($stmt);
        return $row; 
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function getDoctorAppointmentsCountToday($doctorId) {
    global $myCon;

    $today = date("Y-m-d");
    $sql = "SELECT count(appointment_id) AS appointment_count FROM appointment 
            INNER JOIN schedule ON appointment.appointment_schedule_id = schedule.schedule_id
            WHERE schedule.schedule_doctor_id = ? 
            AND DATE(schedule.schedule_date) = ? 
            AND appointment.appointment_status = 1;";

    $stmt = mysqli_stmt_init($myCon);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $msg = "Error: MySQL statement Failed";
        echo '<script>alert("' . $msg . '");</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmt, "is", $doctorId, $today);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    return $row['appointment_count'];
}

function getDoctorUpcomingAppointmentsCount($doctorId) {
    global $myCon;

    $today = date("Y-m-d");
    $sql = "SELECT COUNT(appointment_id) AS appointment_count 
            FROM appointment 
            INNER JOIN schedule ON appointment.appointment_schedule_id = schedule.schedule_id
            WHERE schedule.schedule_doctor_id = ? 
            AND DATE(schedule.schedule_date) >= ? 
            AND appointment.appointment_status = 1;";

    $stmt = mysqli_stmt_init($myCon);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $msg = "Error: MySQL statement Failed";
        echo '<script>alert("' . $msg . '");</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmt, "is", $doctorId, $today);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    return $row['appointment_count'];
}

function getPendingPrescriptionCount($doctorId) {
    global $myCon;

    // Get current date and time
    $currentTime = date("H:i:s");
    $currentDate = date("Y-m-d");

    // SQL query to count appointments
    $sql = "SELECT COUNT(appointment_id) AS pending_appointments_count 
            FROM appointment
            INNER JOIN schedule ON appointment.appointment_schedule_id = schedule.schedule_id
            WHERE schedule.schedule_doctor_id = ? 
            AND ((DATE(schedule.schedule_date) = ? AND schedule.schedule_start_time < ?) 
            OR DATE(schedule.schedule_date) < ?)
            AND appointment.appointment_status = 1
            AND appointment.appointment_prescription_status = 0;";

    $stmt = mysqli_stmt_init($myCon);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $msg = "Error: MySQL statement Failed";
        echo '<script>alert("' . $msg . '");</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmt, "isss", $doctorId, $currentDate, $currentTime, $currentDate);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    return $row['pending_appointments_count'];
}

function hasScheduleForToday($doctorId)
{
    global $myCon;

    // Get the current date
    $today = date("Y-m-d");

    // SQL query to check if the doctor has a schedule for today
    $sql = "SELECT COUNT(schedule_id) AS schedule_count 
            FROM schedule 
            WHERE schedule_doctor_id = ? 
            AND DATE(schedule_date) = ?;";

    $stmt = mysqli_stmt_init($myCon);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $msg = "Error: MySQL statement Failed";
        echo '<script>alert("' . $msg . '");</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmt, "is", $doctorId, $today);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    return $row['schedule_count'] > 0;
}

function hasScheduleForTomorrow($doctorId)
{
    global $myCon;

    // Get the date for tomorrow
    $tomorrow = date("Y-m-d", strtotime("+1 day"));

    // SQL query to check if the doctor has a schedule for tomorrow
    $sql = "SELECT COUNT(schedule_id) AS schedule_count 
            FROM schedule 
            WHERE schedule_doctor_id = ? 
            AND DATE(schedule_date) = ?;";

    $stmt = mysqli_stmt_init($myCon);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $msg = "Error: MySQL statement Failed";
        echo '<script>alert("' . $msg . '");</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmt, "is", $doctorId, $tomorrow);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);

    return $row['schedule_count'] > 0;
}

function getUpcomingAppointments($doctorId) {
    global $myCon;

    // Get current date and time
    $currentTime = date("H:i:s");
    $currentDate = date("Y-m-d");

    // SQL query to select upcoming appointments with patient details
    $sql = "SELECT appointment.*, 
                   schedule.schedule_date, 
                   schedule.schedule_start_time, 
                   patient.user_fname AS patient_fname, 
                   patient.user_lname AS patient_lname
            FROM appointment
            INNER JOIN schedule ON appointment.appointment_schedule_id = schedule.schedule_id
            INNER JOIN user AS patient ON appointment.appointment_patient_id = patient.user_id
            WHERE schedule.schedule_doctor_id = ? 
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

    mysqli_stmt_bind_param($stmt, "isss", $doctorId, $currentDate, $currentTime, $currentDate);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $appointments = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $appointments[] = $row;
    }

    mysqli_stmt_close($stmt);

    return $appointments;
}

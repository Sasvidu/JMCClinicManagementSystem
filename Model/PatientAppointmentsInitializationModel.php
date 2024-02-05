<?php

    require_once "../Commons/JeevaniDB.php";
    $thisDBConnection = new DbConnection();
    $myCon = $thisDBConnection->con;

    $patientId = $_SESSION['userId'];
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    
    
    if(isset($_POST['limitSelector'])){
        $_SESSION['limitAppointments'] = $_POST['limitSelector'];
        $limit = $_POST['limitSelector'];
        $page = 1;
    }else{
        if(isset($_SESSION['limitAppointments'])){
            $limit = $_SESSION['limitAppointments'];
        }else{
            $_SESSION['limitAppointments'] = 10;
            $limit = 10;
        }
    }
    
    $start = ($page - 1) * $limit;
    
    if (isset($_GET["search"])) {
    
        $filters = $_GET["search"];
        $page = 0;
    
        $sql = 
            "SELECT 
                appointment.*,
                schedule.*,
                doctor.*,
                patient_user.user_fname AS patient_first_name,
                doctor_user.user_fname AS doctor_first_name,
                patient_user.user_lname AS patient_last_name,
                doctor_user.user_lname AS doctor_last_name,
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
                CONCAT(doctor_user.user_fname, doctor_user.user_lname, doctor.doctor_specialisation, appointment_time) LIKE '%$filters%'
            AND 
                appointment_patient_id = '$patientId'
            AND
                appointment_status = 1
            ORDER BY 
                schedule.schedule_date DESC;
            ";
    
        $result = $myCon->query($sql) or die($myCon->error);
        $resCheck = mysqli_num_rows($result);
    
        $appointments = $result->fetch_all(MYSQLI_ASSOC);
    
    } else {
    
        $sql = 
            "SELECT 
                appointment.*,
                schedule.*,
                doctor.*,
                patient_user.user_fname AS patient_first_name,
                doctor_user.user_fname AS doctor_first_name,
                patient_user.user_lname AS patient_last_name,
                doctor_user.user_lname AS doctor_last_name,
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
                appointment_patient_id = '$patientId' 
            AND    
                appointment_status = 1
            ORDER BY 
                schedule.schedule_date DESC
            LIMIT
                $start, $limit;    
            ";

        $result = $myCon->query($sql) or die($myCon->error);
        $resCheck = mysqli_num_rows($result);
    
        $appointments = $result->fetch_all(MYSQLI_ASSOC);
    }
    
    $sqlNew = "SELECT count(appointment_id) AS appointment_id FROM appointment WHERE appointment_patient_id = '$patientId' AND appointment_status=1";
    $resultNew = $myCon->query($sqlNew) or die($myCon->error);
    $appointmentCount = $resultNew->fetch_all(MYSQLI_ASSOC);
    $total = $appointmentCount[0]['appointment_id'];
    $pages = ceil($total / $limit);
    
    $previous = $page - 1;
    $next = $page + 1;
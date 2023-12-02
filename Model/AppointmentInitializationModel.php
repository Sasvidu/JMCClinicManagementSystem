<?php

    require_once "../Commons/JeevaniDB.php";
    $thisDBConnection = new DbConnection();
    $myCon = $thisDBConnection->con;

    if (isset($_GET["search"])) {

        $filters = $_GET["search"];

        if(isset($_GET["DateInput"])){

            $dateOG = $_GET["DateInput"];
            $dateOG = strval($dateOG);
            $date = date("Y-m-d", strtotime($dateOG));

            $sql = 
            "SELECT 
                appointment.*,
                schedule.*,
                doctor.*,
                patient_user.user_fname AS patient_first_name,
                doctor_user.user_fname AS doctor_first_name,
                patient_user.user_lname AS patient_last_name,
                doctor_user.user_lname AS doctor_last_name
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
                CONCAT(patient_user.user_fname, patient_user.user_lname, doctor_user.user_fname, doctor_user.user_lname, doctor.doctor_specialisation, appointment_time) LIKE '%$filters%'
            AND
                DATE(schedule.schedule_date) = '$date'
            AND 
                appointment_status = 1
            ORDER BY 
                schedule.schedule_date DESC;
            ";

        }else{

            $sql = 
            "SELECT 
                appointment.*,
                schedule.*,
                doctor.*,
                patient_user.user_fname AS patient_first_name,
                doctor_user.user_fname AS doctor_first_name,
                patient_user.user_lname AS patient_last_name,
                doctor_user.user_lname AS doctor_last_name
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
                CONCAT(patient_user.user_fname, patient_user.user_lname, doctor_user.user_fname, doctor_user.user_lname, doctor.doctor_specialisation, appointment_time) LIKE '%$filters%'
            AND 
                appointment_status = 1
            ORDER BY 
                schedule.schedule_date DESC;
            ";

        }

        $result = $myCon->query($sql) or die($myCon->error);
        $resCheck = mysqli_num_rows($result);

        $appointments = $result->fetch_all(MYSQLI_ASSOC);
    
    } else {

        $date = date("Y-m-d");
    
        $sql = 
        "SELECT 
            appointment.*,
            schedule.*,
            doctor.*,
            patient_user.user_fname AS patient_first_name,
            doctor_user.user_fname AS doctor_first_name,
            patient_user.user_lname AS patient_last_name,
            doctor_user.user_lname AS doctor_last_name
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
            DATE(schedule.schedule_date) = '$date'
        AND 
            appointment_status = 1
        ORDER BY 
            schedule.schedule_date DESC;
        ";
        $result = $myCon->query($sql) or die($myCon->error);
        $resCheck = mysqli_num_rows($result);
    
        $appointments = $result->fetch_all(MYSQLI_ASSOC);
    }

<?php

    require_once "../Commons/JeevaniDB.php";
    $thisDBConnection = new DbConnection();
    $myCon = $thisDBConnection->con;
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    
    
    if(isset($_POST['limitSelector'])){
        $_SESSION['limitPrescriptions'] = $_POST['limitSelector'];
        $limit = $_POST['limitSelector'];
        $page = 1;
    }else{
        if(isset($_SESSION['limitPrescriptions'])){
            $limit = $_SESSION['limitPrescriptions'];
        }else{
            $_SESSION['limitPrescriptions'] = 10;
            $limit = 10;
        }
    }
    
    $start = ($page - 1) * $limit;
    
    if (isset($_GET["search"])) {
    
        $filters = $_GET["search"];
        $page = 0;

        $sql = 
        "SELECT 
            * 
        FROM 
            prescription 
        JOIN 
            appointment ON prescription.prescription_appointment_id = appointment.appointment_id
        JOIN
            schedule ON appointment.appointment_schedule_id = schedule.schedule_id
        JOIN
            user ON appointment.appointment_patient_id = user.user_id 
        JOIN 
            medicine ON prescription.prescription_medicine_id = medicine.medicine_id
        WHERE
            CONCAT(appointment_id, user_fname, user_lname, schedule_date, medicine_name, medicine_category, medicine_batch_no) LIKE '%$filters%'
        AND 
            prescription_status=1 
        ORDER BY 
            schedule_date DESC, prescription_id ASC 
        LIMIT 
            $start, $limit;";

        $result = $myCon->query($sql) or die($myCon->error);
        $resCheck = mysqli_num_rows($result);
    
        $prescriptions = $result->fetch_all(MYSQLI_ASSOC);
    
    } else {
    
        $sql = 
        "SELECT 
            * 
        FROM 
            prescription 
        JOIN 
            appointment ON prescription.prescription_appointment_id = appointment.appointment_id
        JOIN
            schedule ON appointment.appointment_schedule_id = schedule.schedule_id
        JOIN
            user ON appointment.appointment_patient_id = user.user_id 
        JOIN 
            medicine ON prescription.prescription_medicine_id = medicine.medicine_id
        WHERE 
            prescription_status=1 
        ORDER BY 
            schedule_date DESC, prescription_id ASC 
        LIMIT 
            $start, $limit;";
        $result = $myCon->query($sql) or die($myCon->error);
        $resCheck = mysqli_num_rows($result);
    
        $prescriptions = $result->fetch_all(MYSQLI_ASSOC);
    }
    
    $sqlNew = "SELECT count(prescription_id) AS prescription_id FROM prescription WHERE prescription_status=1";
    $resultNew = $myCon->query($sqlNew) or die($myCon->error);
    $prescriptionCount = $resultNew->fetch_all(MYSQLI_ASSOC);
    $total = $prescriptionCount[0]['prescription_id'];
    $pages = ceil($total / $limit);
    
    $previous = $page - 1;
    $next = $page + 1;
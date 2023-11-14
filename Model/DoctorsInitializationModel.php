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
        $_SESSION['limitDoctors'] = $_POST['limitSelector'];
        $limit = $_POST['limitSelector'];
        $page = 1;
    }else{
        if(isset($_SESSION['limitDoctors'])){
            $limit = $_SESSION['limitDoctors'];
        }else{
            $_SESSION['limitDoctors'] = 10;
            $limit = 10;
        }
    }
    
    $start = ($page - 1) * $limit;
    
    if (isset($_GET["search"])) {
    
        $filters = $_GET["search"];
        $page = 0;
    
        $sql = "SELECT * FROM doctor JOIN user ON doctor.doctor_user_id = user.user_id WHERE CONCAT(user_fname, user_lname, doctor_specialisation, doctor_qualifications, doctor_experience, doctor_tel_no, user_email, user_address) LIKE '%$filters%' AND doctor_status=1 ORDER BY doctor_id ASC;";
    
        $result = $myCon->query($sql) or die($myCon->error);
        $resCheck = mysqli_num_rows($result);
    
        $doctors = $result->fetch_all(MYSQLI_ASSOC);
    
        //No need to check whether its empty as new array adddition is provided on the same page
    } else {
    
        $sql = "SELECT * FROM doctor JOIN user ON doctor.doctor_user_id = user.user_id WHERE doctor_status=1 ORDER BY doctor_id ASC LIMIT $start, $limit;";
        $result = $myCon->query($sql) or die($myCon->error);
        $resCheck = mysqli_num_rows($result);
    
        $doctors = $result->fetch_all(MYSQLI_ASSOC);
    }
    
    $sqlNew = "SELECT count(doctor_id) AS doctor_id FROM doctor WHERE doctor_status=1";
    $resultNew = $myCon->query($sqlNew) or die($myCon->error);
    $doctorCount = $resultNew->fetch_all(MYSQLI_ASSOC);
    $total = $doctorCount[0]['doctor_id'];
    $pages = ceil($total / $limit);
    
    $previous = $page - 1;
    $next = $page + 1;
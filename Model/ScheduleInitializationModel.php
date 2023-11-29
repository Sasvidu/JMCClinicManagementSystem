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
        $_SESSION['limitSchedules'] = $_POST['limitSelector'];
        $limit = $_POST['limitSelector'];
        $page = 1;
    }else{
        if(isset($_SESSION['limitSchedules'])){
            $limit = $_SESSION['limitSchedules'];
        }else{
            $_SESSION['limitSchedules'] = 10;
            $limit = 10;
        }
    }
    
    $start = ($page - 1) * $limit;
    
    if (isset($_GET["search"])) {
    
        $filters = $_GET["search"];
        $page = 0;
    
        $sql = "SELECT * FROM schedule JOIN doctor ON schedule.schedule_doctor_id = doctor.doctor_id JOIN user ON doctor.doctor_user_id = user.user_id WHERE CONCAT(schedule_id, schedule_date, user_fname, user_lname, doctor_specialisation, schedule_start_time, schedule_end_time) LIKE '%$filters%' AND schedule_status=1 ORDER BY schedule_date DESC;";
    
        $result = $myCon->query($sql) or die($myCon->error);
        $resCheck = mysqli_num_rows($result);
    
        $schedules = $result->fetch_all(MYSQLI_ASSOC);
    
    } else {
    
        $sql = "SELECT * FROM schedule JOIN doctor ON schedule.schedule_doctor_id = doctor.doctor_id JOIN user ON doctor.doctor_user_id = user.user_id WHERE schedule_status=1 ORDER BY schedule_date DESC;";
        $result = $myCon->query($sql) or die($myCon->error);
        $resCheck = mysqli_num_rows($result);
    
        $schedules = $result->fetch_all(MYSQLI_ASSOC);
    }
    
    $sqlNew = "SELECT count(schedule_id) AS schedule_id FROM schedule WHERE schedule_status=1";
    $resultNew = $myCon->query($sqlNew) or die($myCon->error);
    $scheduleCount = $resultNew->fetch_all(MYSQLI_ASSOC);
    $total = $scheduleCount[0]['schedule_id'];
    $pages = ceil($total / $limit);
    
    $previous = $page - 1;
    $next = $page + 1;
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
        $_SESSION['limitMedicines'] = $_POST['limitSelector'];
        $limit = $_POST['limitSelector'];
        $page = 1;
    }else{
        if(isset($_SESSION['limitMedicines'])){
            $limit = $_SESSION['limitMedicines'];
        }else{
            $_SESSION['limitMedicines'] = 10;
            $limit = 10;
        }
    }
    
    $start = ($page - 1) * $limit;
    
    if (isset($_GET["search"])) {
    
        $filters = $_GET["search"];
        $page = 0;
    
        $sql = "SELECT * FROM medicine WHERE CONCAT(medicine_name, medicine_batch_no, medicine_brand, medicine_company, medicine_category, medicine_size, medicine_price) LIKE '%$filters%' AND medicine_status=1 ORDER BY medicine_id ASC;";
    
        $result = $myCon->query($sql) or die($myCon->error);
        $resCheck = mysqli_num_rows($result);
    
        $medicines = $result->fetch_all(MYSQLI_ASSOC);
    
        //No need to check whether its empty as new array adddition is provided on the same page
    } else {
    
        $sql = "SELECT * FROM medicine WHERE medicine_status=1 ORDER BY medicine_id ASC LIMIT $start, $limit;";
        $result = $myCon->query($sql) or die($myCon->error);
        $resCheck = mysqli_num_rows($result);
    
        $medicines = $result->fetch_all(MYSQLI_ASSOC);
    }
    
    $sqlNew = "SELECT count(medicine_id) AS medicine_id FROM medicine WHERE medicine_status=1";
    $resultNew = $myCon->query($sqlNew) or die($myCon->error);
    $medicineCount = $resultNew->fetch_all(MYSQLI_ASSOC);
    $total = $medicineCount[0]['medicine_id'];
    $pages = ceil($total / $limit);
    
    $previous = $page - 1;
    $next = $page + 1;
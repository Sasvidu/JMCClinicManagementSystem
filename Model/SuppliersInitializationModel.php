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
        $_SESSION['limitSuppliers'] = $_POST['limitSelector'];
        $limit = $_POST['limitSelector'];
        $page = 1;
    }else{
        if(isset($_SESSION['limitSuppliers'])){
            $limit = $_SESSION['limitSuppliers'];
        }else{
            $_SESSION['limitSuppliers'] = 10;
            $limit = 10;
        }
    }
    
    $start = ($page - 1) * $limit;
    
    if (isset($_GET["search"])) {
    
        $filters = $_GET["search"];
        $page = 0;
    
        $sql = "SELECT * FROM supplier WHERE CONCAT(supplier_name, supplier_origin, supplier_specialisation, supplier_pending_payment) LIKE '%$filters%' AND supplier_status=1 ORDER BY supplier_id ASC;";
    
        $result = $myCon->query($sql) or die($myCon->error);
        $resCheck = mysqli_num_rows($result);
    
        $suppliers = $result->fetch_all(MYSQLI_ASSOC);
    
        //No need to check whether its empty as new array adddition is provided on the same page
    } else {
    
        $sql = "SELECT * FROM supplier WHERE supplier_status=1 ORDER BY supplier_id ASC LIMIT $start, $limit;";
        $result = $myCon->query($sql) or die($myCon->error);
        $resCheck = mysqli_num_rows($result);
    
        $suppliers = $result->fetch_all(MYSQLI_ASSOC);
    }
    
    $sqlNew = "SELECT count(supplier_id) AS supplier_id FROM supplier WHERE supplier_status=1";
    $resultNew = $myCon->query($sqlNew) or die($myCon->error);
    $supplierCount = $resultNew->fetch_all(MYSQLI_ASSOC);
    $total = $supplierCount[0]['supplier_id'];
    $pages = ceil($total / $limit);
    
    $previous = $page - 1;
    $next = $page + 1;
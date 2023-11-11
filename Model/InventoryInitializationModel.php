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
        $_SESSION['limitInventory'] = $_POST['limitSelector'];
        $limit = $_POST['limitSelector'];
        $page = 1;
    }else{
        if(isset($_SESSION['limitInventory'])){
            $limit = $_SESSION['limitInventory'];
        }else{
            $_SESSION['limitInventory'] = 10;
            $limit = 10;
        }
    }
    
    $start = ($page - 1) * $limit;
    
    if (isset($_GET["search"])) {
    
        $filters = $_GET["search"];
        $page = 0;
    
        $sql = "SELECT * FROM stock JOIN medicine ON stock.stock_medicine_id = medicine.medicine_id WHERE CONCAT(stock_id, stock_qty_current, stock_qty_max, stock_qty_buffer, stock_updated_date, stock_created_date, medicine_name, medicine_batch_no, medicine_company, medicine_category) LIKE '%$filters%' AND stock_status=1 ORDER BY stock_updated_date DESC;";
    
        $result = $myCon->query($sql) or die($myCon->error);
        $resCheck = mysqli_num_rows($result);
    
        $stocks = $result->fetch_all(MYSQLI_ASSOC);
    
        //No need to check whether its empty as new array adddition is provided on the same page
    } else {
    
        $sql = "SELECT * FROM stock JOIN medicine ON stock.stock_medicine_id = medicine.medicine_id WHERE stock_status=1 ORDER BY stock_updated_date DESC LIMIT $start, $limit;";
        $result = $myCon->query($sql) or die($myCon->error);
        $resCheck = mysqli_num_rows($result);
    
        $stocks = $result->fetch_all(MYSQLI_ASSOC);
    }
    
    $sqlNew = "SELECT count(stock_id) AS stock_id FROM stock WHERE stock_status=1";
    $resultNew = $myCon->query($sqlNew) or die($myCon->error);
    $stockCount = $resultNew->fetch_all(MYSQLI_ASSOC);
    $total = $stockCount[0]['stock_id'];
    $pages = ceil($total / $limit);
    
    $previous = $page - 1;
    $next = $page + 1;
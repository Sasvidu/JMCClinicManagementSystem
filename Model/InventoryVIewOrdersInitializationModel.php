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
    $_SESSION['limitOrders'] = $_POST['limitSelector'];
    $limit = $_POST['limitSelector'];
    $page = 1;
}else{
    if(isset($_SESSION['limitOrders'])){
        $limit = $_SESSION['limitOrders'];
    }else{
        $_SESSION['limitOrders'] = 10;
        $limit = 10;
    }
}


$start = ($page - 1) * $limit;


if (isset($_GET["search"])) {

    $filters = $_GET["search"];
    $page = 0;

    $sql = "SELECT * FROM stockorder JOIN medicine ON medicine.medicine_id = stockorder.order_medicine_id JOIN supplier ON supplier.supplier_id = stockorder.order_supplier_id WHERE CONCAT(medicine_name, supplier_name, order_id, order_date, order_qty, order_price) LIKE '%$filters%' AND order_status=1 ORDER BY order_date DESC;";

    $result = $myCon->query($sql) or die($myCon->error);
    $resCheck = mysqli_num_rows($result);

    if ($resCheck > 0) {
        $orders = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $msg = "No records have been read from the database";
        $msg = base64_encode($msg);
        header("location: ../View/Inventory.php?msg=$msg");
        exit();
    }

} else {

    $sql = "SELECT * FROM stockorder JOIN medicine ON medicine.medicine_id = stockorder.order_medicine_id JOIN supplier ON supplier.supplier_id = stockorder.order_supplier_id WHERE order_status=1 ORDER BY order_date DESC LIMIT $start, $limit;";
    $result = $myCon->query($sql) or die($myCon->error);
    $resCheck = mysqli_num_rows($result);

    if ($resCheck > 0) {
        $orders = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $msg = "No records have been read form the database";
        $msg = base64_encode($msg);
        header("location: ../View/Inventory.php?msg=$msg");
        exit();
    }
}


$sqlNew = "SELECT count(order_id) AS order_id FROM stockorder WHERE order_status=1";
$resultNew = $myCon->query($sqlNew) or die($myCon->error);
$orderCount = $resultNew->fetch_all(MYSQLI_ASSOC);
$total = $orderCount[0]['order_id'];
$pages = ceil($total / $limit);

$previous = $page - 1;
$next = $page + 1;
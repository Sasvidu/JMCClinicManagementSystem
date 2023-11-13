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
    $_SESSION['limitPayments'] = $_POST['limitSelector'];
    $limit = $_POST['limitSelector'];
    $page = 1;
}else{
    if(isset($_SESSION['limitPayments'])){
        $limit = $_SESSION['limitPayments'];
    }else{
        $_SESSION['limitPayments'] = 10;
        $limit = 10;
    }
}


$start = ($page - 1) * $limit;


if (isset($_GET["search"])) {

    $filters = $_GET["search"];
    $page = 0;

    $sql = "SELECT * FROM payment JOIN supplier ON payment.payment_supplier_id = supplier.supplier_id WHERE CONCAT(payment_id, payment_amount, payment_date, supplier_name, supplier_id, order_id, payment_comment) LIKE '%$filters%' AND payment_status=1 ORDER BY payment_date DESC;";

    $result = $myCon->query($sql) or die($myCon->error);
    $resCheck = mysqli_num_rows($result);

    if ($resCheck > 0) {
        $payments = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $msg = "No records have been read from the database";
        $msg = base64_encode($msg);
        header("location: ../View/SuppliersViewPayments.php?msg=$msg");
        exit();
    }

} else {

    $sql = "SELECT * FROM payment JOIN supplier ON payment.payment_supplier_id = supplier.supplier_id WHERE payment_status=1 ORDER BY payment_date DESC LIMIT $start, $limit;";
    $result = $myCon->query($sql) or die($myCon->error);
    $resCheck = mysqli_num_rows($result);

    if ($resCheck > 0) {
        $payments = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $msg = "No records have been read form the database";
        $msg = base64_encode($msg);
        header("location: ../View/Suppliers.php?msg=$msg");
        exit();
    }
}


$sqlNew = "SELECT count(payment_id) AS payment_id FROM payment WHERE payment_status=1";
$resultNew = $myCon->query($sqlNew) or die($myCon->error);
$paymentCount = $resultNew->fetch_all(MYSQLI_ASSOC);
$total = $paymentCount[0]['payment_id'];
$pages = ceil($total / $limit);

$previous = $page - 1;
$next = $page + 1;
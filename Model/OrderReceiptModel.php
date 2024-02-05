<?php

require_once '../Commons/JeevaniDB.php';

function orderExists($con, $orderId)
{
    $sql = "SELECT * FROM stockorder WHERE (order_id = ? AND order_status=1);";

    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $msg = "Error: MySQL statement Failed";
        $msg = base64_encode($msg);
        header("location: ../View/InventoryViewOrders.php?msg=$msg");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $orderId);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function medicineExists($con, $medicineId)
{
    $sql = "SELECT * FROM medicine WHERE medicine_id = ?;";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $msg = "Error: MySQL statement Failed";
        $msg = base64_encode($msg);
        header("location: ../View/InventoryViewOrders.php?msg=$msg");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $medicineId);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function supplierExists($con, $supplierId)
{
    $sql = "SELECT * FROM supplier WHERE supplier_id = ?;";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $msg = "Error: MySQL statement Failed";
        $msg = base64_encode($msg);
        header("location: ../View/InventoryViewOrders.php?msg=$msg");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $supplierId);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

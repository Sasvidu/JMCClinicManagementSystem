<?php

require_once '../Commons/JeevaniDB.php';

function emptyInputCheck($con, $medicineId, $supplierId, $OGdate, $Qty)
{

    if ($medicineId == "") {
        $msg = "Medicine not found!";
        $msg = base64_encode($msg);
        header("location: ../View/Inventory.php?msg=$msg");
    }

    $sql = "SELECT * FROM stock WHERE stock_medicine_id = ?;";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $msg = "Error: MySQL statement Failed";
        $msg = base64_encode($msg);
        header("location: ../View/Inventory.php?msg=$msg");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $medicineId);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $MaxQty = 0;
    $CurrentQty = 0;

    if ($row = mysqli_fetch_assoc($resultData)) {
        $MaxQty = $row["stock_qty_max"];
        $CurrentQty = $row["stock_qty_current"];
    } else {
        $msg = "Error: Couldn't fetch medicine quantities from the database";
        $msg = base64_encode($msg);
        header("location: ../View/Inventory.php?msg=$msg");
        exit();
    }

    if ($supplierId == "Unspecified") {
        $msg = "Please select a supplier!";
        $msg = base64_encode($msg);
        header("location: ../View/Inventory.php?msg=$msg");
    } else if ($OGdate == "") {
        $msg = "Order date cannot be empty!";
        $msg = base64_encode($msg);
        header("location: ../View/Inventory.php?msg=$msg");
    } else if ($Qty == "") {
        $msg = "Order quantity cannot be empty!";
        $msg = base64_encode($msg);
        header("location: ../View/Inventory.php?msg=$msg");
    } else if ($MaxQty < ($CurrentQty + $Qty)) {
        $msg = "There is not enough space in the inventory to hold the ordered medicines, please order a lower amount.";
        $msg = base64_encode($msg);
        header("location: ../View/Inventory.php?msg=$msg");
    } else {
        return true;
    }
}

function getMedicinePrice($con, $medicineId)
{

    $sql = "SELECT * FROM medicine WHERE medicine_id = ?;";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $msg = "Error: MySQL statement Failed";
        $msg = base64_encode($msg);
        header("location: ../View/Inventory.php?msg=$msg");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $medicineId);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        $medicinePrice = $row["medicine_price"];
        return $medicinePrice;
    } else {
        $msg = "Error: Couldn't fetch medicine price from the database";
        $msg = base64_encode($msg);
        header("location: ../View/Inventory.php?msg=$msg");
        exit();
    }

    mysqli_stmt_close($stmt);
}

function placeOrder($con, $medicineId, $supplierId, $Date, $Qty, $Price)
{

    $sql = "INSERT INTO stockorder(order_medicine_id, order_date, order_qty, order_price, order_supplier_id) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $msg = "Error: MySQL statement Failed";
        $msg = base64_encode($msg);
        header("location: ../View/Inventory.php?msg=$msg");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $medicineId, $Date, $Qty, $Price, $supplierId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "UPDATE stock SET stock_qty_current = stock_qty_current + ? WHERE stock_medicine_id = ?;";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $msg = "Error: MySQL statement Failed";
        $msg = base64_encode($msg);
        header("location: ../View/Inventory.php?msg=$msg");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $Qty, $medicineId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "UPDATE supplier SET supplier_pending_payment = supplier_pending_payment + ? WHERE supplier_id = ?;";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $msg = "Error: MySQL statement Failed";
        $msg = base64_encode($msg);
        header("location: ../View/Inventory.php?msg=$msg");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $Price, $supplierId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $code = "Order Placed Successfully!";
    $code = base64_encode($code);
    header("location: ../View/Inventory.php?msg=$code");
}

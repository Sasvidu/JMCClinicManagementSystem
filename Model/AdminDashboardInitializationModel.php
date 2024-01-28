<?php

require_once "../Commons/JeevaniDB.php";
$thisDBConnection = new DbConnection();
$myCon = $thisDBConnection->con;


//Cards Data:
function getMedicineCount() {
    global $myCon;
    $sql = "SELECT count(medicine_id) AS medicine_count FROM medicine WHERE medicine_status=1;";
    
    $result = mysqli_query($myCon, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['medicine_count'];
}

function getDoctorCount() {
    global $myCon;
    $sql = "SELECT count(doctor_id) AS doctor_count FROM doctor WHERE doctor_status=1;";
    
    $result = mysqli_query($myCon, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['doctor_count'];
}

function getTotalSupplierPendingPayment() {
    global $myCon;  
    $sql = "SELECT SUM(supplier_pending_payment) AS total_pending_payment FROM supplier;";
    
    $result = mysqli_query($myCon, $sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['total_pending_payment'];
    } else {
        throw new Exception("Error Calculating Total Payment Owed to Suppliers");
    }
}

function getDailyAppointmentCount() {
    global $myCon;

    $todayDate = date('Y-m-d');

    $sql = "SELECT COUNT(appointment.appointment_id) AS today_appointments_count
            FROM appointment
            INNER JOIN schedule ON appointment.appointment_schedule_id = schedule.schedule_id
            WHERE DATE(schedule.schedule_date) = '$todayDate' AND appointment_status=1;";

    $result = mysqli_query($myCon, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['today_appointments_count'];
    } else {
        throw new Exception("Error Reading Daily Appointments");
    }
}

//Messages Data:
function getMedicinesWithNoStocksCreatedFor() {
    global $myCon;

    $sql = "SELECT * FROM medicine WHERE medicine_status = 1 AND medicine_stock_status = 0;";

    $result = mysqli_query($myCon, $sql);

    if ($result) {
        $medicines = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $medicines[] = $row;
        }
        return $medicines;
    } else {
        throw new Exception("Error retrieving out-of-stock medicines");
    }
}

function getMedicinesBelowBufferLevel() {
    global $myCon;

    $sql = "SELECT medicine.*, stock.*
            FROM stock
            JOIN medicine ON stock.stock_medicine_id = medicine.medicine_id
            WHERE medicine.medicine_status = 1 AND stock.stock_qty_current < stock.stock_qty_buffer;";

    $result = mysqli_query($myCon, $sql);

    if ($result) {
        $medicines = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $medicines[] = $row;
        }
        return $medicines;
    } else {
        throw new Exception("Error retrieving medicines exceeding buffer limit");
    }
}

function getUnpaidOrders() {
    global $myCon;

    $sql = "SELECT * FROM stockorder WHERE order_completed_payment < order_price;";

    $result = mysqli_query($myCon, $sql);

    if ($result) {
        $unpaidOrders = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $unpaidOrders[] = $row;
        }
        return $unpaidOrders;
    } else {
        throw new Exception("Error retrieving unpaid orders");
    }
}

function getTradeReceivables() {
    global $myCon;

    $sql = "SELECT * FROM supplier WHERE supplier_pending_payment < 0;";

    $result = mysqli_query($myCon, $sql);

    if ($result) {
        $receivables = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $receivables[] = $row;
        }
        return $receivables;
    } else {
        throw new Exception("Error retrieving Trade Receivables");
    }
}

function getTradePayables() {
    global $myCon;

    $sql = "SELECT * FROM supplier WHERE supplier_pending_payment > 0;";

    $result = mysqli_query($myCon, $sql);

    if ($result) {
        $payables = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $payables[] = $row;
        }
        return $payables;
    } else {
        throw new Exception("Error retrieving Trade Payables");
    }
}

function getDoctorsWithoutScheduleTomorrow() {
    global $myCon;

    $tomorrowDate = date('Y-m-d', strtotime('+1 day'));

    $sql = "SELECT DISTINCT doctor.*, user.*
            FROM doctor
            JOIN user ON doctor.doctor_user_id = user.user_id
            WHERE doctor.doctor_id NOT IN (
                SELECT DISTINCT schedule.schedule_doctor_id
                FROM schedule
                WHERE DATE(schedule.schedule_date) = '$tomorrowDate'
            )
            AND doctor.doctor_status = 1;
            ";

    $result = mysqli_query($myCon, $sql);

    if ($result) {
        $doctors = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $doctors[] = $row;
        }
        return $doctors;
    } else {
        throw new Exception("Error Retrieving Doctors Without Schedule for Tomorrow");
    }
}
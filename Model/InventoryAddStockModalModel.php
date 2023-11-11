<?php

require_once '../Commons/JeevaniDB.php';

    //Check for erroneous input:
    function InputCheck($Id, $MaxQty, $BufferQty, $Date){

        if($Id=="Unspecified"){
           $msg = "Product cannot be empty!";
           $msg = base64_encode($msg);
           header("location: ../View/Inventory.php?msg=$msg");
        }else if($MaxQty==""){
            $msg = "Maximum quantity cannot be empty!";
            $msg = base64_encode($msg);
            header("location: ../View/Inventory.php?msg=$msg");
        }else if($BufferQty==""){
            $msg = "Re-order quantity cannot be empty!";
            $msg = base64_encode($msg);
            header("location: ../View/Inventory.php?msg=$msg");
        }else if($Date==""){
            $msg = "Date of creation cannot be empty!";
            $msg = base64_encode($msg);
            header("location: ../View/Inventory.php?msg=$msg");
        }else if($BufferQty > $MaxQty){
            $msg = "Re-Order quantity cannot exceed Maximum quantity!";
            $msg = base64_encode($msg);
            header("location: ../View/Inventory.php?msg=$msg");
        }else{
            return true;
        }

    }

    //Add the stock to the database:
    function InsertStock($con, $Id, $MaxQty, $BufferQty, $Date){

        //Prepare and Execute SQL statements:
        //Add entry to stock table:
        $sql = "INSERT INTO stock(stock_id, stock_medicine_id, stock_qty_max, stock_qty_buffer, stock_created_date, stock_updated_date) VALUES (?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL Insert statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Inventory.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssssss", $Id, $Id, $MaxQty, $BufferQty, $Date, $Date);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        //Update medicine table to ensure records with a created stock aren't fetched in the add modal
        $sql = "UPDATE medicine SET medicine_stock_status = 1 WHERE medicine_id = ?;";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL Update statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Inventory.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $Id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $code = "Stock created successfully!";
        $code = base64_encode($code);
        header("location: ../View/Inventory.php?msg=$code");

    }




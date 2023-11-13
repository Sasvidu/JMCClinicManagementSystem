<?php

require_once '../Commons/JeevaniDB.php';


    //Check for empty input:
    function emptyInputCheck($name, $origin, $specialisation){

        if($name==""){
           $msg = "Supplier name cannot be empty!";
           $msg = base64_encode($msg);
           header("location: ../View/Suppliers.php?msg=$msg");
        }else if($origin==""){
            $msg = "Supplier origin cannot be empty!";
            $msg = base64_encode($msg);
            header("location: ../View/Suppliers.php?msg=$msg");
        }else if($specialisation==""){
            $msg = "Supplier specialisation cannot be empty!";
            $msg = base64_encode($msg);
            header("location: ../View/Suppliers.php?msg=$msg");
        }else{
            return true;
        }

    }

    //Add the supplier to the database:
    function InsertSupplier($con, $name, $origin, $specialisation){

        //Prepare and Execute SQL statement:
        $sql = "INSERT INTO supplier(supplier_name, supplier_origin, supplier_specialisation) VALUES (?, ?, ?);";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Suppliers.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sss", $name, $origin, $specialisation);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        //Send success message to the inventory page:
        $code = "Supplier added successfully!";
        $code = base64_encode($code);
        header("location: ../View/Suppliers.php?msg=$code");

    }




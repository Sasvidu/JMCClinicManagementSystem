<?php

require_once '../Commons/JeevaniDB.php';


    //Check for empty input:
    function emptyInputCheck($id, $name, $origin, $specialisation){

        if($id==""){
            $msg = "Error loading Supplier details!";
            $msg = base64_encode($msg);
            header("location: ../View/Suppliers.php?msg=$msg");
        }else if($name==""){
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


    //Edit the supplier:
    function UpdateSupplier($con, $id, $name, $origin, $specialisation){

        //Prepare and Execute SQL statement:
        $sql = "UPDATE supplier SET supplier_name = ?, supplier_origin = ?, supplier_specialisation = ? WHERE supplier_id = ?;";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Suppliers.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sssi", $name, $origin, $specialisation, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        //Send success message to the supplier page:
        $code = "Supplier updated successfully!";
        $code = base64_encode($code);
        header("location: ../View/Suppliers.php?msg=$code");

    }




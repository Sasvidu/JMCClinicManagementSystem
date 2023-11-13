<?php

require_once '../Commons/JeevaniDB.php';


    //Check for empty input:
    function emptyInputCheck($category, $brand, $company, $name, $batch, $size, $price){

        if($category=="Unspecified"){
           $msg = "Medicine category cannot be empty!";
           $msg = base64_encode($msg);
           header("location: ../View/Medicine.php?msg=$msg");
        }else if($brand==""){
            $msg = "Medicine brand cannot be empty!";
            $msg = base64_encode($msg);
            header("location: ../View/Medicine.php?msg=$msg");
        }else if($company==""){
            $msg = "Medicine company cannot be empty!";
            $msg = base64_encode($msg);
            header("location: ../View/Medicine.php?msg=$msg");
        }else if($name==""){
            $msg = "Medicine name cannot be empty!";
            $msg = base64_encode($msg);
            header("location: ../View/Medicine.php?msg=$msg");
        }else if($batch==""){
            $msg = "Medicine batch number cannot be empty!";
            $msg = base64_encode($msg);
            header("location: ../View/Medicine.php?msg=$msg");
        }else if($size==""){
            $msg = "Medicine size cannot be empty!";
            $msg = base64_encode($msg);
            header("location: ../View/Medicine.php?msg=$msg");
        }else if($price==""){
            $msg = "Medicine price cannot be empty!";
            $msg = base64_encode($msg);
            header("location: ../View/Medicine.php?msg=$msg");
        }else{
            return true;
        }

    }

    /*
    function productExists($con, $category, $brand, $name){
            
        $sql = "SELECT * FROM product WHERE (product_name = ? AND product_brand = ? AND product_category = ?);";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Inventory.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sss", $name, $brand, $category);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }else{
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);

    }
    */

    //Add the medicine to the database:
    function InsertMedicine($con, $category, $brand, $company, $name, $batch, $size, $price, $info){

        //Prepare and Execute SQL statement:
        $sql = "INSERT INTO medicine(medicine_category, medicine_brand, medicine_company, medicine_name, medicine_batch_no, medicine_size, medicine_price, medicine_info) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Medicine.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssssssss", $category, $brand, $company, $name, $batch, $size, $price, $info);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        //Send success message to the inventory page:
        $code = "Medicine added successfully!";
        $code = base64_encode($code);
        header("location: ../View/Medicine.php?msg=$code");

    }




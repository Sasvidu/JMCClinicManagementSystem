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

    //Edit the product:
    function UpdateMedicine($con, $id, $category, $brand, $company, $name, $batch, $size, $price, $info){

        //Prepare and Execute SQL statement:
        $sql = "UPDATE medicine SET medicine_category = ?, medicine_brand = ?, medicine_company = ?, medicine_name = ?, medicine_batch_no = ?, medicine_size = ?, medicine_price = ?, medicine_info = ? WHERE medicine_id = ?;";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Medicine.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssssssssi", $category, $brand, $company, $name, $batch, $size, $price, $info, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        //Send success message ot the inventory page:
        $code = "Medicine updated successfully!";
        $code = base64_encode($code);
        header("location: ../View/Medicine.php?msg=$code");

    }




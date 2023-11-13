<?php

require_once "../Commons/JeevaniDB.php";

    function emptyInputCheck($id, $pendingPayment){

        if($id == ""){
            $msg = "Error loading supplier details";
            $msg = base64_encode($msg);
            header("location: ../View/Suppliers.php?msg=$msg");
        }else if($pendingPayment == ""){
            $msg = "Error loading supplier details";
            $msg = base64_encode($msg);
            header("location: ../View/Suppliers.php?msg=$msg");
        }else{
            return true;
        }

    }

    function DeleteSupplier($con, $id, $pendingPayment){

        if($pendingPayment > 0){
            $msg = "Cannot delete suppliers to whom money is owed!";
            $msg = base64_encode($msg);
            header("location: ../View/Suppliers.php?msg=$msg");
        }else{

            $sql = "UPDATE supplier SET supplier_status = 0 WHERE supplier_id = ?;";

            $stmt = mysqli_stmt_init($con);  

            if(!mysqli_stmt_prepare($stmt, $sql)){
                $msg = "Error: MySQL statement Failed";
                $msg = base64_encode($msg);
                header("location: ../View/Suppliers.php?msg=$msg");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "s", $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            $code = "Supplier deleted successfully!";
            $code = base64_encode($code);
            header("location: ../View/Suppliers.php?msg=$code");

        }

    }

?>
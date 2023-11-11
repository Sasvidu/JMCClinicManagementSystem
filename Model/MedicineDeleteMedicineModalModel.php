<?php

require_once '../Commons/JeevaniDB.php';

    function DeleteMedicine($con, $id){

        $sql = "UPDATE medicine SET medicine_status = 0, medicine_stock_status = 0 WHERE medicine_id = ?";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Medicine.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $sqla = "UPDATE stock SET stock_status = 0 WHERE stock_medicine_id = ?";

        $stmta = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmta, $sqla)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Medicine.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmta, "s", $id);
        mysqli_stmt_execute($stmta);
        mysqli_stmt_close($stmta);

        $code = "Medicine deleted successfully!";
        $code = base64_encode($code);
        header("location: ../View/Medicine.php?msg=$code");

    }


?>

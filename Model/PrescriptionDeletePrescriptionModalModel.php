<?php

require_once '../Commons/JeevaniDB.php';

    function prescriptionExists($con, $id){
                
        $sql = "SELECT * FROM prescription WHERE prescription_id = ?;";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Prescriptions.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $id);
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

    function DeletePrescription($con, $id){

        $prescription = prescriptionExists($con, $id);
        $appointmentId = $prescription["prescription_appointment_id"];
        $medicineId = $prescription["prescription_medicine_id"];
        $qty = $prescription["prescription_medicine_qty"];

        $sql = "UPDATE prescription SET prescription_status = 0 WHERE prescription_id = ?";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Prescriptions.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $sqla = "UPDATE appointment SET appointment_prescription_status = 0 WHERE appointment_id = ?";

        $stmta = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmta, $sqla)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Prescriptions.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmta, "s", $appointmentId);
        mysqli_stmt_execute($stmta);
        mysqli_stmt_close($stmta);

        $sqlb = "UPDATE stock SET stock_qty_current = stock_qty_current + ? WHERE stock_medicine_id = ?";

        $stmtb = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmtb, $sqlb)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Prescriptions.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmtb, "ss", $qty, $medicineId);
        mysqli_stmt_execute($stmtb);
        mysqli_stmt_close($stmtb);

        $code = "Prescription deleted successfully!";
        $code = base64_encode($code);
        header("location: ../View/Prescriptions.php?msg=$code");

    }


?>

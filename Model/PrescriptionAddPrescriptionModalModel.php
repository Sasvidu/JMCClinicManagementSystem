<?php

require_once '../Commons/JeevaniDB.php';


    //Check for empty input:
    function emptyInputCheck($appointmentId, $medicineId, $qty){

        if($appointmentId=="Unspecified"){
           $msg = "Medicine category cannot be empty!";
           $msg = base64_encode($msg);
           header("location: ../View/Prescriptions.php?msg=$msg");
        }else if($medicineId==""){
            $msg = "Medicine brand cannot be empty!";
            $msg = base64_encode($msg);
            header("location: ../View/Prescriptions.php?msg=$msg");
        }else if($qty==""){
            $msg = "Medicine company cannot be empty!";
            $msg = base64_encode($msg);
            header("location: ../View/Prescriptions.php?msg=$msg");
        }else{
            return true;
        }

    }

    //Add the prescription to the database:
    function InsertPrescription($con, $appointmentId, $medicineId, $qty){

        //Prepare and Execute SQL statement to Insert the new prescription:
        $sql = "INSERT INTO prescription(prescription_id, prescription_appointment_id, prescription_medicine_id, prescription_medicine_qty) VALUES (?, ?, ?, ?);";

        $stmt = mysqli_stmt_init($con);  

        if(!mysqli_stmt_prepare($stmt, $sql)){
            $msg = "Error: MySQL statement Failed";
            $msg = base64_encode($msg);
            header("location: ../View/Prescriptions.php?msg=$msg");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssss", $appointmentId, $appointmentId, $medicineId, $qty);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        //Prepare and Execute SQL statement to update the prescription status of the appointment:
        $sqla = "UPDATE appointment SET appointment_prescription_status = 1 WHERE appointment_id = ?;";

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

        //Prepare and Execute SQL statement to update the quantity of medicine in stock:
        $sqlb = "UPDATE stock SET stock_qty_current = stock_qty_current - ? WHERE stock_medicine_id = ?;";

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

        //Send success message to the inventory page:
        $code = "Prescription added successfully!";
        $code = base64_encode($code);
        header("location: ../View/Prescriptions.php?msg=$code");

    }




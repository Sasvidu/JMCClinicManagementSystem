<?php

    if(!isset($_GET["status"])){

        ?>
            <script>window.location="../View/Suppliers.php"</script>
        <?php
        exit();

    }else{

        session_start();
        if(!isset($_SESSION["userName"])){                   
            $msg = "Please login first";
            $msg = base64_encode($msg);
            header("location: ../View/Login.php?msg=$msg");
        }

        $supplierId = $_POST['SupplierId'];
        $orderId = $_POST['OrderId'];

        $OGDate = $_POST['PaymentDate'];
        $OGDate = strval($OGDate);
        $date = date("Y-m-d", strtotime($OGDate));

        $OGAmount = $_POST["PaymentAmount"];
        $amount = number_format((float)$OGAmount, 2, '.', '');

        $comment = $_POST["PaymentComment"];

        require_once "../Model/SuppliersMakePaymentModalModel.php";
        require_once '../Commons/JeevaniDB.php';

        $thisDBConnection = new DbConnection();
        $myCon = $thisDBConnection->con;

        if($OrderId == "Unspecified"){
            if(LowerInputCheck($supplierId, $OGDate, $OGAmount, $comment) === true){
                LowerInsertPayment($myCon, $date, $amount, $supplierId, $comment);

                $code = "Payment Recorded Successfully";
                $code = base64_encode($code);
                header("location: ../View/Suppliers.php?msg=$code");
            }
        }else{
            if(UpperInputCheck($orderId, $supplierId, $OGDate, $OGAmount) === true){
                UpperInsertPayment($myCon, $date, $amount, $supplierId, $orderId, $comment);

                $code = "Payment Recorded Successfully";
                $code = base64_encode($code);
                header("location: ../View/Suppliers.php?msg=$code");
            }
        }
        
    }


?>
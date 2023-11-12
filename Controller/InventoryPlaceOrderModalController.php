<?php

    if(!isset($_GET["status"])){

        ?>
            <script>window.location="../View/Inventory.php"</script>
        <?php
        exit();

    }else{

        session_start();
        if(!isset($_SESSION["userName"])){                   
            $msg = "Please login first";
            $msg = base64_encode($msg);
            header("location: ../View/Login.php?msg=$msg");
        }

        $medicineId = $_POST["MedicineId"];
        $supplierId = $_POST["Supplier"];
        $OGdate = $_POST["OrderDate"];
        $Qty = $_POST["Qty"];

        require_once "../Commons/JeevaniDB.php";
        require_once "../Model/InventoryPlaceOrderModalModel.php";

        $thisDBConnection = new DbConnection();
        $myCon = $thisDBConnection->con;

        if(emptyInputCheck($myCon, $medicineId, $supplierId, $OGdate, $Qty) === true){

            $OGdate = strval($OGdate);
            $Date = date("Y-m-d", strtotime($OGdate));

            $Payment = $Qty * getMedicinePrice($myCon, $medicineId);
            
            placeOrder($myCon, $medicineId, $supplierId, $Date, $Qty, $Payment);

        }
    }

?>
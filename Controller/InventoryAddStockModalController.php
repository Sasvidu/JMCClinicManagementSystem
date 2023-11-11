<?php

    //Verify that the controller had been accessed through the view:
    if(!isset($_GET["status"])){

        session_destroy();
        header("location: ../index.html");

    }else{

        //Verify that user has logged in:
        session_start();
        if(!isset($_SESSION["userName"])){                   
            $msg = "Please login first";
            $msg = base64_encode($msg);
            header("location: ../View/Login.php?msg=$msg");
        }

        //Load data from view:
        $medicineId = $_POST['Medicine'];
        $maxQty = $_POST['MaxQty'];
        $bufferQty = $_POST['BufferQty'];
        $date = $_POST['Date'];

        //Load the database connection string and model:
        require_once "../Model/InventoryAddStockModalModel.php";
        require_once '../Commons/JeevaniDB.php';

        //Create database connection object:
        $thisDBConnection = new DbConnection();
        $myCon = $thisDBConnection->con;

        //Add the stock to the database, and update medicine:
        if(InputCheck($medicineId, $maxQty, $bufferQty, $date) === true){
            InsertStock($myCon, $medicineId, $maxQty, $bufferQty, $date);
            
        }
        
    }


?>
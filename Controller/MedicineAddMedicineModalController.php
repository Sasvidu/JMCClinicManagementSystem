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
        $category = $_POST['Category'];
        $brand = $_POST['Brand'];
        $company = $_POST['Company'];
        $name = $_POST['Name'];
        $batch = $_POST['Batch'];
        $size = $_POST['Size'];
        $info = $_POST['Info'];

        //Convert price in the decimal format required by the database:
        $OGprice = $_POST["Price"];
        $price = number_format((float)$OGprice, 2, '.', '');

        //Load the database connection string and model:
        require_once "../Model/MedicineAddMedicineModalModel.php";
        require_once '../Commons/JeevaniDB.php';

        //Create database connection object:
        $thisDBConnection = new DbConnection();
        $myCon = $thisDBConnection->con;

        //Add the medicine to the database:
        if(emptyInputCheck($category, $brand, $company, $name, $batch, $size, $OGprice) === true){
            InsertMedicine($myCon, $category, $brand, $company, $name, $batch, $size, $price, $info);
        }

        /*
        if(productExists($myCon, $category, $brand, $name) !== false){
            $msg = "Product already exists";
            $msg = base64_encode($msg);
            header("location: ../View/Inventory.php?msg=$msg");
            exit();
        }
        */
        
    }


?>
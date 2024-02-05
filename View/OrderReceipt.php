<?php

if ($_GET["status"] != "true") {

    header("location: ../View/InventoryViewOrders.php");

} else {

    require_once '../Model/Session.php';
    require_once '../Commons/fpdf186/fpdf.php';
    require_once '../Model/OrderReceiptModel.php';
    require_once '../Commons/JeevaniDB.php';

    $thisDBConnection = new DbConnection();
    $myCon = $thisDBConnection->con;

    //Define Id
    if(isset($_GET["id"])){
        $orderId = $_GET["id"];
    }
    else{
        header("location: ../View/InventoryViewOrders.php");
    }

    $orderRow = orderExists($myCon, $orderId);

    //Define Data
    $orderId;
    $orderDate;
    $orderMedicineId;
    $orderMedicineName;
    $orderMedicineBatchNo;
    $orderMedicineBrand;
    $orderMedicineCompany;
    $orderMedicineCategory;
    $orderMedicineSize;
    $orderMedicinePrice;
    $orderMedicineInfo;
    $orderQty;
    $orderPayment;
    $orderCompletedPayment;
    $orderPendingPayment;
    $orderSupplierId;
    $orderSupplier;

    //Search data
    if ($orderRow === false) {
        $msg = "Error reading receipt data";
        $msg = base64_encode($msg);
        header("location: ../View/InventoryViewOrders.php?msg=$msg");
    } else {
        $orderId = $orderRow['order_id'];
        $orderDate = $orderRow['order_date'];
        $orderMedicineId = $orderRow['order_medicine_id'];
        $orderQty = $orderRow['order_qty'];
        $orderPayment = $orderRow['order_price'];
        $orderCompletedPayment = $orderRow['order_completed_payment'];
        $orderPendingPayment = $orderPayment - $orderCompletedPayment;
        $orderSupplierId = $orderRow['order_supplier_id'];

        $medicineRow = medicineExists($myCon, $orderMedicineId);
        $supplierRow = supplierExists($myCon, $orderSupplierId);


        if ($medicineRow === false) {
            $msg = "Error reading Medicine data";
            $msg = base64_encode($msg);
            header("location: ../View/InventoryViewOrders.php?msg=$msg");
        } else {
            $orderMedicineName = $medicineRow['medicine_name'];
            $orderMedicineBatchNo = $medicineRow['medicine_batch_no'];
            $orderMedicineBrand = $medicineRow['medicine_brand'];
            $orderMedicineCompany = $medicineRow['medicine_company'];
            $orderMedicineCategory = $medicineRow['medicine_category'];
            $orderMedicineSize = $medicineRow['medicine_size'];
            $orderMedicinePrice = $medicineRow['medicine_price'];
            $orderMedicineInfo = $medicineRow['medicine_info'];
        }


        if ($supplierRow === false) {
            $msg = "Error reading supplier data";
            $msg = base64_encode($msg);
            header("location: ../View/InventoryViewOrders.php?msg=$msg");
        } else {
            $orderSupplier = $supplierRow['supplier_name'];
        }
    }

    //Present Data
    $pdf = new FPDF();
    $pdf->AddPage("P", "A5");
    $width = $pdf->GetPageWidth();

    $pdf->SetTitle("Receipt #$orderId");

    $pdf->SetFont("Arial", "B", "20");
    $pdf->Image("../Commons/HMM.png", 10, 5, 30, 30);
    $pdf->Cell(0, 20, "Receipt #$orderId", 0, 1, "C");

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell(0, 5, "", 0, 1, "C");

    $pdf->Cell(65, 8, "Order Id:", 0, 0, "L");
    $pdf->Cell(65, 8, "$orderId", 0, 1, "R");

    $pdf->Cell(65, 8, "Order Date:", 0, 0, "L");
    $pdf->Cell(65, 8, "$orderDate", 0, 1, "R");

    $pdf->Cell(65, 8, "Medicine Id:", 0, 0, "L");
    $pdf->Cell(65, 8, "$orderMedicineId", 0, 1, "R");

    $pdf->Cell(65, 8, "Medicine Name:", 0, 0, "L");
    $pdf->Cell(65, 8, "$orderMedicineName", 0, 1, "R");

    $pdf->Cell(65, 8, "Medicine Batch No:", 0, 0, "L");
    $pdf->Cell(65, 8, "$orderMedicineBatchNo", 0, 1, "R");

    $pdf->Cell(65, 8, "Medicine Brand:", 0, 0, "L");
    $pdf->Cell(65, 8, "$orderMedicineBrand", 0, 1, "R");
    
    $pdf->Cell(65, 8, "Medicine Company:", 0, 0, "L");
    $pdf->Cell(65, 8, "$orderMedicineCompany", 0, 1, "R");

    $pdf->Cell(65, 8, "Medicine Category:", 0, 0, "L");
    $pdf->Cell(65, 8, "$orderMedicineCategory", 0, 1, "R");

    $pdf->Cell(65, 8, "Medicine Size:", 0, 0, "L");
    $pdf->Cell(65, 8, "$orderMedicineSize", 0, 1, "R");

    $pdf->Cell(65, 8, "Medicine Current Price:", 0, 0, "L");
    $pdf->Cell(65, 8, "$orderMedicinePrice", 0, 1, "R");

    $pdf->Cell(65, 8, "Medicine Comment:", 0, 0, "L");
    $pdf->Cell(65, 8, "$orderMedicineInfo", 0, 1, "R");

    $pdf->Cell(65, 8, "Ordered Quantity:", 0, 0, "L");
    $pdf->Cell(65, 8, "$orderQty", 0, 1, "R");

    $pdf->Cell(65, 8, "Total Payment:", 0, 0, "L");
    $pdf->Cell(65, 8, "$orderPayment", 0, 1, "R");

    $pdf->Cell(65, 8, "Payment Made:", 0, 0, "L");
    $pdf->Cell(65, 8, "$orderCompletedPayment", 0, 1, "R");

    $pdf->Cell(65, 8, "Payment Pending:", 0, 0, "L");
    $pdf->Cell(65, 8, "$orderPendingPayment", 0, 1, "R");

    $pdf->Cell(65, 8, "Supllier Id:", 0, 0, "L");
    $pdf->Cell(65, 8, "$orderSupplierId", 0, 1, "R");

    $pdf->Cell(65, 8, "Supplier Name:", 0, 0, "L");
    $pdf->Cell(65, 8, "$orderSupplier", 0, 1, "R");


    $pdf->Cell(0, 10, "", 0, 1, "L");
    $pdf->Cell(0, 5, "This is a computer generated document.", 0, 1, "C");
    $pdf->Output();
    
}

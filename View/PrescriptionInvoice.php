<?php

require_once '../Model/Session.php';

if ($_GET["status"] != "true") {

    route();
    
} else {


    require_once '../Commons/fpdf186/fpdf.php';
    require_once '../Model/PrescriptionInvoiceModel.php';
    require_once '../Commons/JeevaniDB.php';

    $thisDBConnection = new DbConnection();
    $myCon = $thisDBConnection->con;

    //Define Id
    if(isset($_GET["id"])){
        $prescriptionId = $_GET["id"];
    }
    else{
        route();
    }

    $prescriptionRow = prescriptionExists($myCon, $prescriptionId);

    //Define Data
    $prescriptionId;
    $prescriptionDoctorId;
    $prescriptionDoctorName;
    $prescriptionDoctorSpecialization;
    $prescriptionPatientName;
    $prescriptionMedicineId;
    $prescriptionMedicineName;
    $prescriptionMedicineQty;
    $prescriptionAppointmentId;
    $prescriptionAppointmentDate;
    $prescriptionAppointmentTime;

    //Search data
    if ($prescriptionRow === false) {

        $msg = "Error reading prescription data";
        handleError($msg);

    } else {

        $prescriptionId = $prescriptionRow['prescription_id'];
        $prescriptionMedicineId = $prescriptionRow['prescription_medicine_id'];
        $prescriptionMedicineQty = $prescriptionRow['prescription_medicine_qty'];
        $prescriptionAppointmentId = $prescriptionRow['prescription_appointment_id'];

        $medicineRow = medicineExists($myCon, $prescriptionMedicineId);
        $appointmentRow = appointmentExists($myCon, $prescriptionAppointmentId);

        if($medicineRow === false){

            $msg = "Error reading medicine data";
            handleError($msg);

        }else{

            $prescriptionMedicineName = $medicineRow['medicine_name'];

        }

        if($appointmentRow === false){

            $msg = "Error reading appointment data";
            handleError($msg);

        }else{

            $prescriptionDoctorName = $appointmentRow['doctor_fname'] . " " . $appointmentRow['doctor_lname'];
            $prescriptionDoctorSpecialization = $appointmentRow['doctor_specialisation'];
            $prescriptionPatientName = $appointmentRow['patient_fname'] . " " . $appointmentRow['patient_lname'];
            $prescriptionAppointmentId = $appointmentRow['appointment_id'];
            $prescriptionAppointmentDate = $appointmentRow['schedule_date'];
            $prescriptionAppointmentTime = $appointmentRow['appointment_time'];

        }

    }

    //Present Data
    $pdf = new FPDF();
    $pdf->AddPage("P", "A5");
    $width = $pdf->GetPageWidth();

    $pdf->SetTitle("Voucher #$prescriptionId");

    $pdf->SetFont("Arial", "B", "20");
    $pdf->Image("../Commons/HMM.png", 10, 5, 30, 30);
    $pdf->Cell(0, 20, "Voucher #$prescriptionId", 0, 1, "C");

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell(0, 20, "", 0, 1, "C");

    $pdf->Cell(65, 8, "prescription Id:", 0, 0, "L");
    $pdf->Cell(65, 8, "$prescriptionId", 0, 1, "R");

    $pdf->Cell(65, 8, "Doctor Name:", 0, 0, "L");
    $pdf->Cell(65, 8, "$prescriptionDoctorName", 0, 1, "R");

    $pdf->Cell(65, 8, "Doctor Specialisation:", 0, 0, "L");
    $pdf->Cell(65, 8, "$prescriptionDoctorSpecialization", 0, 1, "R");

    $pdf->Cell(65, 8, "Patient Name:", 0, 0, "L");
    $pdf->Cell(65, 8, "$prescriptionPatientName", 0, 1, "R");

    $pdf->Cell(65, 8, "Appointment Id:", 0, 0, "L");
    $pdf->Cell(65, 8, "$prescriptionAppointmentId", 0, 1, "R");

    $pdf->Cell(65, 8, "Appointment Date & Time:", 0, 0, "L");
    $pdf->Cell(65, 8, "$prescriptionAppointmentDate" . ", " . "$prescriptionAppointmentTime", 0, 1, "R");

    $pdf->Cell(65, 8, "Medicine Id:", 0, 0, "L");
    $pdf->Cell(65, 8, "$prescriptionMedicineId", 0, 1, "R");

    $pdf->Cell(65, 8, "Medicine Name:", 0, 0, "L");
    $pdf->Cell(65, 8, "$prescriptionMedicineName", 0, 1, "R");

    $pdf->Cell(65, 8, "Medicine Quantity:", 0, 0, "L");
    $pdf->Cell(65, 8, "$prescriptionMedicineQty", 0, 1, "R");

    $pdf->Cell(0, 20, "", 0, 1, "L");
    $pdf->Cell(0, 10, "This is a computer generated document.", 0, 1, "C");
    $pdf->Output();

}

function route(){
    global $userRole;

    if($userRole == "Doctor"){
        header("location: ../View/DoctorAppointments.php");
    }else if($userRole == "Patient"){
        header("location: ../View/PatientAppointments.php");
    }else{
        header("location: ../View/Prescriptions.php");
    }
}

function handleError($msg){
    global $userRole;

    $msg = base64_encode($msg);

    if($userRole == "Doctor"){
        header("location: ../View/DoctorAppointments.php?msg=$msg");
    }else if($userRole == "Patient"){
        header("location: ../View/PatientAppointments.php?msg=$msg");
    }else{
        header("location: ../View/Prescriptions.php?msg=$msg");
    }
}
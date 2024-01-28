<?php

require_once "../Commons/JeevaniDB.php";
$thisDBConnection = new DbConnection();
$myCon = $thisDBConnection->con;

$sql = "SELECT 
        appointment.*,
        schedule.*,
        doctor.*,
        doctorUser.*,
        patient.user_id AS patient_id,
        patient.user_fname AS patient_fname,
        patient.user_lname AS patient_lname,
        patient.user_email AS patient_email
        FROM appointment
        JOIN schedule ON appointment.appointment_schedule_id = schedule.schedule_id
        JOIN doctor ON schedule.schedule_doctor_id = doctor.doctor_id
        JOIN user AS doctorUser ON doctor.doctor_user_id = doctorUser.user_id
        JOIN user AS patient ON appointment.appointment_patient_id = patient.user_id
        WHERE 
        appointment_status = 1 
        AND appointment_prescription_status = 0 
        ORDER BY schedule_date ASC;
        ";
$result = $myCon->query($sql) or die($myCon->error);
$resCheck = mysqli_num_rows($result);

if ($resCheck > 0) {
    $appointments = $result->fetch_all(MYSQLI_ASSOC);
} else if ($resCheck == 0) {
    $appointments = array("appointment_id" => "0", "schedule_date" => "", "user_fname" => "", "user_lname" => "");
} else {
    $msg = "There are no appointments for which prescriptions haven't been created.";
    echo "<br><p align='center'>$msg</p>";
    exit();
}

$sqlNew = "SELECT * FROM medicine JOIN stock ON medicine.medicine_id = stock.stock_medicine_id WHERE medicine_status=1 AND stock_qty_current > 0 ORDER BY medicine_category, medicine_name;";
$resultNew = $myCon->query($sqlNew) or die($myCon->error);
$resCheckNew = mysqli_num_rows($resultNew);

if ($resCheckNew > 0) {
    $medicines = $resultNew->fetch_all(MYSQLI_ASSOC);
} else if ($resCheckNew == 0) {
    $medicines = array("medicine_id" => "0", "medicine_name" => "No medicines availabe");
} else {
    $msg = "Stocks have been created for all medicines.";
    echo "<br><p align='center'>$msg</p>";
    exit();
}

?>
           
<div id="AddPrescriptionModal" class="modal fade" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- The form points to the controller for the specific modal  -->
            <form action="../Controller/PrescriptionAddPrescriptionModalController.php?status=true" method="post">

                <div class="modal-header">
                    <h5 id="NewPrescriptionModalTitle" class="modal-title">Add a new Prescription</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-12">&nbsp;</div>

                        <!-- Field for Appointment -->
                        <div class="col-12">
                            <label>Appointment:</label>
                            <select id="Appointment" name="Appointment" class="form-select" aria-label="Default select example">
                                <option selected value="Unspecified">Select the appointment for which prescription is created:</option>
                                <?php foreach ($appointments as $appointment) { ?>
                                    <option value="<?php if ($appointment['appointment_id'] == 0) {
                                                        echo "No appointments available";
                                                    } else {
                                                        echo $appointment['appointment_id'];
                                                    } ?>"> 
                                        <?php if ($appointment['appointment_id'] == 0) {
                                            echo "No appointments available";
                                        } else {
                                            echo ($appointment['schedule_date'] . ", " . $appointment['appointment_time'] . "; Doctor: " . $appointment['user_fname'] . " " . $appointment['user_lname'] . ", " . $appointment["doctor_specialisation"] . "; Patient: " . $appointment['patient_fname'] . " " . $appointment['patient_lname']);
                                        } ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12">&nbsp;</div>

                        <!-- Field for Medicine -->
                        <div class="col-12">
                            <label>Medicine to add:</label>
                            <select id="Medicine" name="Medicine" class="form-select" aria-label="Default select example">
                                <option selected value="Unspecified">Select a Medicine</option>
                                <?php foreach ($medicines as $medicine) { ?>

                                    <option value="<?php if ($medicine['medicine_id'] == 0) {
                                                        echo "No medicines available";
                                                    } else {
                                                        echo $medicine['medicine_id'];
                                                    } ?>"> <?php if ($medicine['medicine_id'] == 0) {
                                                                echo "No medicines available";
                                                            } else {
                                                                echo $medicine['medicine_name'];
                                                            } ?>, <?php if ($medicine['medicine_id'] == 0) {
                                                                    echo "No medicines available";
                                                                } else {
                                                                    echo $medicine['medicine_batch_no'];
                                                                } ?>, <?php if ($medicine['medicine_id'] == 0) {
                                                                        echo "No medicines available";
                                                                    } else {
                                                                        echo $medicine['medicine_company'];
                                                                    } ?>, <?php if ($medicine['medicine_id'] == 0) {
                                                                            echo "No medicines available";
                                                                        } else {
                                                                            echo $medicine['medicine_category'];
                                                                        } ?>, <?php if ($medicine['medicine_id'] == 0) {
                                                                            echo "No medicines available";
                                                                        } else {
                                                                            echo ($medicine['stock_qty_current'] . " items available.");
                                                                        } ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12">&nbsp;</div>

                        <!-- Field for Medicine Qty -->
                        <div class="col-12">
                            <label>Medicine quantity:</label>
                            <input id="Qty" name="Qty" type="number" min="0" class="form-control" placeholder="Enter the quantity of medicine allocated">
                        </div>
                        <div class="col-12">&nbsp;</div>

                    </div>

                </div>

                <!-- Confirmation buttons -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Prescription</button>
                </div>

            </form>

        </div>
    </div>
</div>
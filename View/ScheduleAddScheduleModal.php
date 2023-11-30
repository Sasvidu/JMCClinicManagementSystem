<?php

require_once "../Commons/JeevaniDB.php";
$thisDBConnection = new DbConnection();
$myCon = $thisDBConnection->con;

$sql = "SELECT * FROM doctor JOIN user ON doctor.doctor_user_id = user.user_id WHERE doctor_status=1 ORDER BY doctor_id ASC;";
$result = $myCon->query($sql) or die($myCon->error);
$resCheck = mysqli_num_rows($result);

if ($resCheck > 0) {
    $doctors = $result->fetch_all(MYSQLI_ASSOC);
} else if ($resCheck == 0) {
    $doctors = array("doctor_id" => "0", "user_fname" => "", "user_lname" => "");
} else {
    $msg = "There are no doctors added to the system.";
    echo "<br><p align='center'>$msg</p>";
    exit();
}

?>
           
<div id="AddScheduleModal" class="modal fade" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- The form points to the controller for the specific modal  -->
            <form action="../Controller/ScheduleAddScheduleModalController.php?status=true" method="post">

                <div class="modal-header">
                    <h5 id="NewScheduleModalTitle" class="modal-title">Add a new Schedule</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-12">&nbsp;</div>

                        <!-- Field for Schedule Date -->
                        <div class="col-12">
                            <label>Date:</label>
                            <input id="Date" name="Date" type="date" class="form-control">
                        </div>
                        <div class="col-12">&nbsp;</div>

                        <!-- Field for Schedule Doctor -->
                        <div class="col-12">
                            <label>Doctor:</label>
                            <select id="DoctorId" name="DoctorId" class="form-select" aria-label="Default select example">
                                <option selected value="Unspecified">Select a Doctor</option>
                                <?php foreach ($doctors as $doctor) { ?>
                                    <option value="<?php if ($doctor['doctor_id'] == 0) {
                                                        echo "No doctors available";
                                                    } else {
                                                        echo $doctor['doctor_id'];
                                                    } ?>"> 
                                        <?php if ($doctor['doctor_id'] == 0) {
                                            echo "No doctors available";
                                        } else {
                                            echo ($doctor['user_fname'] . " " . $doctor['user_lname'] . ", " . $doctor['doctor_specialisation']);
                                        } ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12">&nbsp;</div>

                        <!-- Field for Schedule Start TIme -->
                        <div class="col-12">
                            <label>Starting TIme:</label>
                            <input id="StartTime" name="StartTime" type="time" class="form-control">
                        </div>
                        <div class="col-12">&nbsp;</div>

                        <!-- Field for Schedule End TIme -->
                        <div class="col-12">
                            <label>Ending TIme:</label>
                            <input id="EndTime" name="EndTime" type="time" class="form-control">
                        </div>
                        <div class="col-12">&nbsp;</div>

                    </div>

                </div>

                <!-- Confirmation buttons -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Schedule</button>
                </div>

            </form>

        </div>
    </div>
</div>
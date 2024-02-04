<?php

require_once "../Model/Session.php";
require_once "../Model/PatientMedicalInfoInitializationModel.php";

$id = $_REQUEST["id"];
$patient = getUser($id);
$patientDataExists = $patient['user_attached_info_id'];

if($patientDataExists == null){
    $patientDataExists = false;
}else{
    $patientDataExists = true;
}

if($patientDataExists){
    $patientData = getPatientData($patient['user_attached_info_id']);
}else{
    $patientData = array(
        'patientdata_id' => null,
        'patientdata_bloodGroup' => null,
        'patientdata_allergies' => null,
        'patientdata_bleedTendancy' => 0,
        'patientdata_heartDisease' => 0,
        'patientdata_highBloodPressure' => 0,
        'patientdata_accident' => 0,
        'patientdata_diabetes' => 0,
        'patientdata_surgery' => 0,
        'patientdata_cholesterol' => 0,
        'patientdata_description' => null,
        'patientdata_history' => null,
        'patientdata_status' => 0 
    );
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jeevani Medical Center</title>

    <!--Link Imported Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap-5.0.2-dist/css/bootstrap.min.css">

    <!--Link Original Stylesheets -->
    <link rel="stylesheet" type="text/css" href="../CSS/MedicalInfoStyles.css">
	<link rel="stylesheet" type="text/css" href="../CSS/AdminDashboardStyles.css">
    <link rel="stylesheet" type="text/css" href="../CSS/CommonDashboardStyles.css">
    <link rel="stylesheet" type="text/css" href="../CSS/Utilities.css">

    <!--Link to Original Script -->


    <!--Link to fontawesome icons -->
    <script src="https://kit.fontawesome.com/0c49cb8566.js" crossorigin="anonymous"></script>

</head>


<body>

    <div class="container-fluid">

        <div class="row">

            <div class="col-2 ribbon">

                <form action="../Controller/DashboardController.php?status=true" method="post">

                    <div class="row flexer">

                        <div class="col-12">
                            &nbsp;
                        </div>

                        <img src="../Commons/icons/iconset/clothes-inverted.png" alt="logo" class="dashboard-image">

                        <div class="col-12">
                            &nbsp;
                        </div>

                    </div>

                    <hr>

                    <div class="row">

                        <div class="col-12 dashboard-item  dashboard-selectable-item" style="padding-top: 0.5rem; padding-bottom: 0.2rem">
                        
                            <button name="dashboard-submit" value="dashboard-submit-dashboard" type="submit" class="dashboard-btn">
                                <img src="../Commons/icons/bg-removed/dashboard-white.png" class="dashboard-item-image">
                                <span class="dashboard-item-text">&nbsp;&nbsp;&nbsp;Dashboard</span>
                            </button>    

                        </div>

                    </div>

                    <hr>

                    <div class="row">

                        <div class="col-12">
                            &nbsp;
                        </div>

                        <div class="col-12 dashboard-item dashboard-selectable-item">

                            <button name="dashboard-submit" value="dashboard-submit-medicine" type="submit" class="dashboard-btn">
                                <img src="../Commons/icons/bg-removed/medicine-whitepng.png" class="dashboard-item-image">
                                <span class="dashboard-item-text">&nbsp;&nbsp;&nbsp;Medicine</span>
                            </button>

                        </div>

                        <div class="col-12">
                            &nbsp;
                        </div>

                        <div class="col-12 dashboard-item dashboard-selectable-item">

                            <button name="dashboard-submit" value="dashboard-submit-inventory" type="submit" class="dashboard-btn">
                                <img src="../Commons/icons/bg-removed/inventory-white.png" class="dashboard-item-image">
                                <span class="dashboard-item-text">&nbsp;&nbsp;&nbsp;Inventory</span>
                            </button>

                        </div>

                        <div class="col-12">
                            &nbsp;
                        </div>

                        <div class="col-12 dashboard-item dashboard-selectable-item">

                            <button name="dashboard-submit" value="dashboard-submit-suppliers" type="submit" class="dashboard-btn">
                                <img src="../Commons/icons/bg-removed/supplier-white.png" class="dashboard-item-image">
                                <span class="dashboard-item-text">&nbsp;&nbsp;&nbsp;Suppliers</span>
                            </button>

                        </div>

                        <div class="col-12">
                            &nbsp;
                        </div>

                        <div class="col-12 dashboard-item dashboard-selectable-item">

                            <button name="dashboard-submit" value="dashboard-submit-doctors" type="submit" class="dashboard-btn">
                                <img src="../Commons/icons/bg-removed/doctor-white.png" class="dashboard-item-image">
                                <span class="dashboard-item-text">&nbsp;&nbsp;&nbsp;Doctors</span>
                            </button>

                        </div>

                        <div class="col-12">
                            &nbsp;
                        </div>

                        <div class="col-12 dashboard-item dashboard-selectable-item" style="padding-left: 1rem">

                            <button name="dashboard-submit" value="dashboard-submit-users" type="submit" class="dashboard-btn">
                                <img src="../Commons/icons/bg-removed/patient-white.png" class="dashboard-item-image">
                                <span class="dashboard-item-text">&nbsp;&nbsp;Users</span>
                            </button>

                        </div>

                        <div class="col-12">
                            &nbsp;
                        </div>

                        <div class="col-12 dashboard-item dashboard-selectable-item">

                            <button name="dashboard-submit" value="dashboard-submit-schedules" type="submit" class="dashboard-btn">
                                <img src="../Commons/icons/bg-removed/schedule-white.png" class="dashboard-item-image">
                                <span class="dashboard-item-text">&nbsp;&nbsp;&nbsp;Schedules</span>
                            </button>

                        </div>

                        <div class="col-12">
                            &nbsp;
                        </div>

                        <div class="col-12 dashboard-item dashboard-selectable-item">

                            <button name="dashboard-submit" value="dashboard-submit-appointments" type="submit" class="dashboard-btn">
                                <img src="../Commons/icons/bg-removed/appointment-white.png" class="dashboard-item-image">
                                <span class="dashboard-item-text">&nbsp;&nbsp;&nbsp;Appointments</span>
                            </button>

                        </div>

                        <div class="col-12">
                            &nbsp;
                        </div>

                        <div class="col-12 dashboard-item dashboard-selectable-item" style="padding-left: 1rem">

                            <button name="dashboard-submit" value="dashboard-submit-prescription-view" type="submit" class="dashboard-btn">
                                <img src="../Commons/icons/bg-removed/prescription-whitepng.png" class="dashboard-item-image">
                                <span class="dashboard-item-text">&nbsp;&nbsp;&nbsp;Prescriptions</span>
                            </button>   

                        </div>

                        <div class="col-12">
                            &nbsp;
                        </div>

                    </div>

                    <hr>

                    <div class="row">

                        <div class="col-12">
                            &nbsp;
                        </div>

                        <div class="col-12 dashboard-item dashboard-selectable-item" style="padding-left: 1rem">

                            <button name="dashboard-submit" value="dashboard-submit-logout" type="submit" class="dashboard-btn">
                                <img src="../Commons/icons/bg-removed/logout-white.png" class="dashboard-item-image">
                                <span class="dashboard-item-text">&nbsp;&nbsp;&nbsp;&nbsp;Logout</span>
                            </button>

                        </div>

                    </div>

                </form>

            </div>

            <div class="col-10">

                <div class="row">

                    <div class="col-12 title-content">

                        <h1 class="title-text">Jeevani Medical Center</h1>
                        <span class="title-welcome">Welcome, <?php echo($userName); ?>.</span>
                        <span class="title-role"><?php echo($userRole); ?></span>

                    </div>

                </div>

                <div class="row">

                    <div class="col-12 main-content">

                        <div class="row">
                            <div class="col-12">
                                <h2 class="TitleTxt">Medical Info of <?php echo($patient['user_fname'] . " " . $patient['user_lname']); ?></h2>
                            </div>
                        </div>

                        <div class="row">

                            <?php if(!$patientDataExists) { ?>
                                <div class="row">
                                    <div class="col-12">&nbsp;</div>
                                    <div class="col-12 flexer" style="color: red;"><p>The medical information of the patient has not been provided yet. Please submit the form to record the medical information of the patient.</p></div>
                                </div>   
                            <?php } ?>

                            <form action="../Controller/PatientMedicalInfoController.php?status=true" method="post" class="mt-4">

                                <input type="hidden" name="userId" value='<?php echo $patient['user_id']; ?>'>
                                <input type="hidden" name="patientDataId" value='<?php echo $patientData['patientdata_id']; ?>'>
                                <input type="hidden" name="patientDataExists" value='<?php echo $patientDataExists; ?>'>

                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <label for="bloodGroup" class="form-label">Blood Group:</label>
                                        <select id="bloodGroup" name="bloodGroup" class="form-select" <?php echo $patientData['patientdata_bloodGroup'] ? 'readonly' : ''; ?>>
                                            <option value="O+" <?php echo ($patientData['patientdata_bloodGroup'] == 'O+') ? 'selected' : ''; ?>>O+</option>
                                            <option value="O-" <?php echo ($patientData['patientdata_bloodGroup'] == 'O-') ? 'selected' : ''; ?>>O-</option>
                                            <option value="A+" <?php echo ($patientData['patientdata_bloodGroup'] == 'A+') ? 'selected' : ''; ?>>A+</option>
                                            <option value="A-" <?php echo ($patientData['patientdata_bloodGroup'] == 'A-') ? 'selected' : ''; ?>>A-</option>
                                            <option value="B+" <?php echo ($patientData['patientdata_bloodGroup'] == 'B+') ? 'selected' : ''; ?>>B+</option>
                                            <option value="B-" <?php echo ($patientData['patientdata_bloodGroup'] == 'B-') ? 'selected' : ''; ?>>B-</option>
                                            <option value="AB+" <?php echo ($patientData['patientdata_bloodGroup'] == 'AB+') ? 'selected' : ''; ?>>AB+</option>
                                            <option value="AB-" <?php echo ($patientData['patientdata_bloodGroup'] == 'AB-') ? 'selected' : ''; ?>>AB-</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="allergies" class="form-label">Allergies:</label>
                                        <textarea id="allergies" name="allergies" rows="4" class="form-control"><?php echo $patientData['patientdata_allergies']; ?></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="heartDisease" class="form-label">Heart Disease:</label>
                                        <select id="heartDisease" name="heartDisease" class="form-select">
                                            <option value="1" <?php echo $patientData['patientdata_heartDisease'] ? 'selected' : ''; ?>>Yes</option>
                                            <option value="0" <?php echo !$patientData['patientdata_heartDisease'] ? 'selected' : ''; ?>>No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="highBloodPressure" class="form-label">High Blood Pressure:</label>
                                        <select id="highBloodPressure" name="highBloodPressure" class="form-select">
                                            <option value="1" <?php echo $patientData['patientdata_highBloodPressure'] ? 'selected' : ''; ?>>Yes</option>
                                            <option value="0" <?php echo !$patientData['patientdata_highBloodPressure'] ? 'selected' : ''; ?>>No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="accident" class="form-label">Accident:</label>
                                        <select id="accident" name="accident" class="form-select">
                                            <option value="1" <?php echo $patientData['patientdata_accident'] ? 'selected' : ''; ?>>Yes</option>
                                            <option value="0" <?php echo !$patientData['patientdata_accident'] ? 'selected' : ''; ?>>No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="diabetes" class="form-label">Diabetes:</label>
                                        <select id="diabetes" name="diabetes" class="form-select">
                                            <option value="1" <?php echo $patientData['patientdata_diabetes'] ? 'selected' : ''; ?>>Yes</option>
                                            <option value="0" <?php echo !$patientData['patientdata_diabetes'] ? 'selected' : ''; ?>>No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="surgery" class="form-label">Surgery:</label>
                                        <select id="surgery" name="surgery" class="form-select">
                                            <option value="1" <?php echo $patientData['patientdata_surgery'] ? 'selected' : ''; ?>>Yes</option>
                                            <option value="0" <?php echo !$patientData['patientdata_surgery'] ? 'selected' : ''; ?>>No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="cholesterol" class="form-label">Cholesterol:</label>
                                        <select id="cholesterol" name="cholesterol" class="form-select">
                                            <option value="1" <?php echo $patientData['patientdata_cholesterol'] ? 'selected' : ''; ?>>Yes</option>
                                            <option value="0" <?php echo !$patientData['patientdata_cholesterol'] ? 'selected' : ''; ?>>No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="description" class="form-label">Description:</label>
                                        <textarea id="description" name="description" rows="4" class="form-control"><?php echo $patientData['patientdata_description']; ?></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <label for="familyHistory" class="form-label">Family Medical History:</label>
                                        <textarea id="familyHistory" name="familyHistory" rows="4" class="form-control"><?php echo $patientData['patientdata_history']; ?></textarea>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-12">&nbsp;</div>

                                    <?php if($patientDataExists){ ?>
                                        <div class="col-12 flexer">
                                            <input type="submit" value="Edit Medical Info" class="btn btn-primary btn-patientData-action">
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-12 flexer">
                                            <input type="submit" value="Add Medical Info" class="btn btn-themed-success btn-patientData-action">
                                        </div>
                                    <?php } ?>

                                </div>

                            </form>
                        
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php

    if (isset($_GET['msg'])) {
        $msg = base64_decode($_GET['msg']);
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }

    ?>

</body>


</html>





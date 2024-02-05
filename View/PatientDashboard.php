<?php

require_once "../Model/Session.php";
require_once "../Model/PatientDashboardInitializationModel.php";

$userId = $_SESSION['userId'];
$upcomingAppointments = getPatientUpcomingAppointments($userId);

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
	<link rel="stylesheet" type="text/css" href="../CSS/AdminDashboardStyles.css">
    <link rel="stylesheet" type="text/css" href="../CSS/CommonDashboardStyles.css">
    <link rel="stylesheet" type="text/css" href="../CSS/Utilities.css">

    <!--Link to Original Script -->
    <!-- <script defer src="../JS/AdminDashboardJS.js"></script> -->

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

                        <div class="col-12 dashboard-item dashboard-selected-item" style="padding-top: 0.5rem; padding-bottom: 0.2rem">
                        
                            <img src="../Commons/icons/bg-removed/dashboard-white.png" class="dashboard-item-image">
                            <span>&nbsp;&nbsp;&nbsp;Dashboard</span>

                        </div>

                    </div>

                    <hr>

                    <div class="row">

                        <div class="col-12">
                            &nbsp;
                        </div>

                        <div class="col-12 dashboard-item dashboard-selectable-item">

                            <button name="dashboard-submit" value="dashboard-submit-appointment-view" type="submit" class="dashboard-btn">
                                <img src="../Commons/icons/bg-removed/appointment-white.png" class="dashboard-item-image">
                                <span class="dashboard-item-text">&nbsp;&nbsp;&nbsp;Appointments</span>
                            </button>

                        </div>

                        <div class="col-12">
                            &nbsp;
                        </div>

                        <div class="col-12 dashboard-item dashboard-selectable-item" style="padding-left: 1rem">

                            <button name="dashboard-submit" value="dashboard-submit-patient-view" type="submit" class="dashboard-btn">
                                <img src="../Commons/icons/bg-removed/patient-white.png" class="dashboard-item-image">
                                <span class="dashboard-item-text">&nbsp;&nbsp;My Info</span>
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

                        <div class="row" style="margin-left: 0.125rem">

                            <div class="card card-themed-danger" style="width: 42.5rem; margin-right: 1rem;">
                                <div class="card-body card-body-themed row">
                                    <div class="col-9">
                                        <h5 class="card-title">Today's Appointments</h5>
                                        <p class="card-text"><?php echo (getPatientAppointmentsCountToday($userId)); ?></p>
                                    </div>
                                    <div class="col-3 card-icon">
                                        <i class="fa-regular fa-clock"></i>                                    
                                    </div>
                                </div>
                            </div>

                            <div class="card card-themed-primary" style="width: 42.5rem;">
                                <div class="card-body card-body-themed row">
                                    <div class="col-9">
                                        <h5 class="card-title">Upcoming Appointments</h5>
                                        <p class="card-text"><?php echo (getPatientUpcomingAppointmentsCount($userId)); ?></p>
                                    </div>
                                    <div class="col-3 card-icon">
                                        <i class="fa-regular fa-calendar-days"></i>                                    
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-12">&nbsp;</div>
                            <div class="col-12">&nbsp;</div>
                            <div class="col-12">&nbsp;</div>
                            <div class="col-12"><h2 class="messages-title">Messages</h2></div>
                            <div class="col-12">&nbsp;</div>

                        </div>

                        <div class="row">

                            <div class="accordion" id="messageList">
        
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            Appointments
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#messageList">
                                        <div class="accordion-body">
                                            <?php foreach($upcomingAppointments as $apppointment) { ?>
                                                <div class="message-item">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <strong>Date:</strong> <?php echo $apppointment['schedule_date'] ?>
                                                        </div>
                                                        <div class="col-6">
                                                            <strong>Time:</strong> <?php echo $apppointment['appointment_time'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <strong>Patient:</strong> <?php echo $apppointment['patient_fname'] . " " . $apppointment['patient_lname'] ?>
                                                        </div>
                                                        <div class="col-6">
                                                            <strong>Doctor:</strong> <?php echo $apppointment['doctor_fname'] . " " . $apppointment['doctor_lname'] ?>
                                                        </div>
                                                    </div>         
                                                </div>
                                            <?php } ?>
                                            <?php if(count($upcomingAppointments) == 0) { ?>
                                                <div class="message-item">No Appointments scheduled for today or after.</div>
                                            <?php } ?> 
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-GLhlTQ8iEWD5RHvYYNl7+5UAW5JVgDOW9aXl9FX0r2miq7/gkC5FpSkEbsKUFAH6" crossorigin="anonymous" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    
</body>


</html>
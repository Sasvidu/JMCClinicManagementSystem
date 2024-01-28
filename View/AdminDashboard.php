<?php

require_once "../Model/Session.php";
require_once "../Model/AdminDashboardInitializationModel.php";

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

                        <div class="row" style="margin-left: 0.125rem">

                            <div class="card card-themed-primary" style="width: 20.5rem; margin-right: 1rem;">
                                <div class="card-body card-body-themed row">
                                    <div class="col-9">
                                        <h5 class="card-title">Medicines</h5>
                                        <p class="card-text"><?php echo(getMedicineCount()); ?></p>
                                    </div>
                                    <div class="col-3 card-icon">
                                        <i class="fa-solid fa-capsules"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-themed-success" style="width: 21rem; margin-right: 1rem;">
                                <div class="card-body card-body-themed row">
                                    <div class="col-9">
                                        <h5 class="card-title">Doctors</h5>
                                        <p class="card-text"><?php echo(getDoctorCount()); ?></p>
                                    </div>
                                    <div class="col-3 card-icon">
                                        <i class="fa-solid fa-user-doctor"></i>
                                    </div>
                                </div>
                            </div>
 
                            <div class="card card-themed-danger" style="width: 21rem; margin-right: 1rem;">
                                <div class="card-body card-body-themed row">
                                    <div class="col-9">
                                        <h5 class="card-title">Pending Payments</h5>
                                        <p class="card-text"><?php echo(getTotalSupplierPendingPayment()); ?></p>
                                    </div>
                                    <div class="col-3 card-icon">
                                        <i class="fa-solid fa-money-bill"></i>                                
                                    </div>
                                </div>
                            </div>

                            <div class="card card-themed-lilac" style="width: 21rem;">
                                <div class="card-body card-body-themed row">
                                    <div class="col-9">
                                        <h5 class="card-title">Daily Appointments</h5>
                                        <p class="card-text"><?php echo(getDailyAppointmentCount()); ?></p>
                                    </div>
                                    <div class="col-3 card-icon">
                                        <i class="fa-regular fa-calendar-check"></i>                                    
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
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Medicine Module
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#messageList">
                                        <div class="accordion-body">
                                            <?php 
                                                $outOfStockMedicines = getMedicinesWithNoStocksCreatedFor();
                                                foreach ($outOfStockMedicines as $outOfStockMedicine) {
                                                ?><div class="message-item">Stock Not Yet Created for <strong><?php echo($outOfStockMedicine['medicine_name'] . " - " . $outOfStockMedicine['medicine_batch_no'] . " - " . $outOfStockMedicine['medicine_category'] . " - " . $outOfStockMedicine['medicine_size'] . " - " . $outOfStockMedicine['medicine_company']); ?></strong></div><?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            Inventory Module
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#messageList">
                                        <div class="accordion-body">
                                            <?php 
                                                $belowBufferLevelMedicines = getMedicinesBelowBufferLevel();
                                                foreach ($belowBufferLevelMedicines as $belowBufferLevelMedicine) {
                                                ?><div class="message-item">Medicine <strong><?php echo($belowBufferLevelMedicine['medicine_name'] . " - " . $belowBufferLevelMedicine['medicine_batch_no'] . " - " . $belowBufferLevelMedicine['medicine_category'] . " - " . $belowBufferLevelMedicine['medicine_size'] . " - " . $belowBufferLevelMedicine['medicine_company']); ?></strong> below buffer level. (Current Qty: <strong><?php echo($belowBufferLevelMedicine['stock_qty_current']); ?></strong>, Buffer Level: <strong><?php echo($belowBufferLevelMedicine['stock_qty_buffer']); ?></strong>)</div><?php
                                                }
                                            ?>
                                            <br>
                                            <?php 
                                                $upaidOrders = getUnpaidOrders();
                                                foreach ($upaidOrders as $upaidOrder) {
                                                ?><div class="message-item">Pending payment of <strong><?php echo($upaidOrder['order_price'] - $upaidOrder['order_completed_payment']); ?></strong> for order Id: <strong><?php echo($upaidOrder['order_id']); ?></strong></div><?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                            Suppliers Module
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#messageList">
                                        <div class="accordion-body">
                                            <?php 
                                                $creditors = getTradePayables();
                                                foreach ($creditors as $creditor) {
                                                ?><div class="message-item">Total <strong>owed to</strong> creditor <strong><?php echo($creditor['supplier_name'] . ", " . $creditor['supplier_origin']); ?></strong> is <strong><?php echo($creditor['supplier_pending_payment']); ?></strong></div><?php
                                                }
                                            ?>
                                            <br>
                                            <?php 
                                                $debtors = getTradeReceivables();
                                                foreach ($debtors as $debtor) {
                                                ?><div class="message-item">Total <strong>owed by</strong> debtor <strong><?php echo($debtor['supplier_name'] . ", " . $debtor['supplier_origin']); ?></strong> is <strong><?php echo(abs($debtor['supplier_pending_payment']) . ".00"); ?></strong></div><?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                            Schedules Module
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse show" data-bs-parent="#messageList">
                                        <div class="accordion-body">
                                            <?php 
                                                $doctorsWithoutSchedulesTomorrow = getDoctorsWithoutScheduleTomorrow();
                                                foreach ($doctorsWithoutSchedulesTomorrow as $doctorsWithoutSchedulesTomorrow) {
                                                ?><div class="message-item">Schedule for Tomorrow not created for Doctor <strong><?php echo($doctorsWithoutSchedulesTomorrow['user_fname'] . " " . $doctorsWithoutSchedulesTomorrow['user_lname'] . ", " . $doctorsWithoutSchedulesTomorrow['doctor_specialisation']); ?></strong></div><?php
                                                }
                                            ?>
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
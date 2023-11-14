<?php

require_once "../Model/Session.php";
require_once "../Model/UsersInitializationModel.php";

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
    <link rel="stylesheet" type="text/css" href="../CSS/UsersStyles.css">
	<link rel="stylesheet" type="text/css" href="../CSS/AdminDashboardStyles.css">
    <link rel="stylesheet" type="text/css" href="../CSS/CommonDashboardStyles.css">
    <link rel="stylesheet" type="text/css" href="../CSS/Utilities.css">

    <!--Link to Original Script -->
    <script defer src="../JS/UsersJS.js"></script>

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

                        <div class="col-12 dashboard-item dashboard-selectable-item" style="padding-top: 0.5rem; padding-bottom: 0.2rem">
                        
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

                        <div class="col-12 dashboard-item dashboard-selected-item" style="padding-left: 1rem">
                           
                            <img src="../Commons/icons/bg-removed/patient-white.png" class="dashboard-item-image">
                            <span class="dashboard-item-text">&nbsp;&nbsp;Users</span>
                            
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
                                <div class="col-8">
                                    <button type="button" class="btn btn-block btn-themed-success btn-add-user" name="addUserButton" id="addUserButton" data-toggle="modal" data-target="#AddUserModal"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add User</button>
                                </div>
                                <div class="col-4 searchbar">
                                    <form action="" method="get">
                                        <div class="input-group mb-3">
                                            <input id="search" name="search" value="<?php if (isset($_GET["search"])) {echo $_GET["search"];} ?>" type="text" class="form-control" placeholder="Search for data">
                                            <button type="submit" class="btn btn-themed-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12">&nbsp;</div>
                                <div class="col-12">&nbsp;</div>
                                <div class="col-12">&nbsp;</div>
                                <div class="col-12">&nbsp;</div>
                            </div>

                        <!-- Admins -->

                        <section>

                            <div class="row">
                                <div class="col-12">
                                    <h2 class="TitleTxt">Admins</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <nav class="paginationNav">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="Users.php?pageAdmins=1">First</a>
                                            </li>
                                            <li class="page-item <?php if ($pageAdmins == 1 || $pageAdmins == 0) {echo "disabled";} ?>">
                                                <a class="page-link" href="Users.php?pageAdmins=<?php echo $previousAdmins; ?>">Previous</a>
                                            </li>
                                            <?php for ($i = 1; $i <= $pagesAdmins; $i++) { ?>
                                                <li class="page-item<?php if ($i == $pageAdmins) {echo " active";} ?>">
                                                    <a class="page-link" href="Users.php?pageAdmins=<?php echo $i; ?>"> <?php echo $i; ?> </a>
                                                </li>
                                            <?php } ?>
                                            <li class="page-item <?php if ($pageAdmins == $pageAdmins || $pageAdmins == 0) {echo "disabled";} ?>">
                                                <a class="page-link" href="Users.php?pageAdmins=<?php echo $nextAdmins; ?>">Next</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="Users.php?pageAdmins=<?php echo $pagesAdmins; ?>">Last</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-striped table-hover table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Date Of Birth</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">NIC</th>
                                                <th scope="th-sm" id="Action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($admins as $admin) { ?>
                                                <tr>
                                                    <th scope="row"><?php echo $admin['user_id']; ?></th>
                                                    <td id="UserName<?php echo $admin['user_id']; ?>"> <?php echo $admin['user_fname'] . " " . $admin['user_lname']; ?></td>
                                                    <td id="UserAddress<?php echo $admin['user_id']; ?>"> <?php echo $admin['user_address']; ?></td>
                                                    <td id="UserDateOfBirth<?php echo $admin['user_id']; ?>"> <?php echo $admin['user_dob']; ?></td>
                                                    <td id="UserEmail<?php echo $admin['user_id']; ?>"> <?php echo $admin['user_email']; ?></td>
                                                    <td id="UserNIC<?php echo $admin['user_id']; ?>"> <?php echo $admin['user_nic']; ?></td>
                                                    <td>
                                                        <?php if($userRole=="Admin") { ?>
                                                            <button type="button" class="btn btn-sm btn-themed-danger btn-action" name="deleteButton" id="del<?php echo $admin['user_id'] ?>" onclick="openDeleteModal(this.id)"><i class="fa-solid fa-trash-can"></i>&nbsp;Delete</button>
                                                            <button type="button" class="btn btn-sm btn-themed-info" name="editButton" id="edit<?php echo $admin['user_id'] ?>" onclick="openEditModal(this.id)"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Edit</button>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <form action="#" method="post" class="limitSelectAdminsForm">
                                    <label>Records per page:</label>
                                    <select id="limitSelectorAdmins" name="limitSelectorAdmins" class="form-select limitSelect" onchange="changeAdminsLimits()">
                                        <option <?php if($limitAdmins == 5){ echo "selected"; } ?> value="5">5</option>
                                        <option <?php if($limitAdmins == 10){ echo "selected"; } ?> value="10">10</option>
                                        <option <?php if($limitAdmins == 20){ echo "selected"; } ?> value="20">20</option>
                                        <option <?php if($limitAdmins == 50){ echo "selected"; } ?> value="50">50</option>
                                        <option <?php if($limitAdmins == 100){ echo "selected"; } ?> value="100">100</option>
                                    </select>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-12">&nbsp;</div>
                                <div class="col-12">&nbsp;</div>
                                <div class="col-12">&nbsp;</div>
                            </div>

                        </section>

                        <!-- Doctors -->

                        <section>

                            <div class="row">
                                <div class="col-12">
                                    <h2 class="TitleTxt">Doctors</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <nav class="paginationNav">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="Users.php?pageDoctors=1">First</a>
                                            </li>
                                            <li class="page-item <?php if ($pageDoctors == 1 || $pageDoctors == 0) {echo "disabled";} ?>">
                                                <a class="page-link" href="Users.php?pageDoctors=<?php echo $previousDoctors; ?>">Previous</a>
                                            </li>
                                            <?php for ($i = 1; $i <= $pagesDoctors; $i++) { ?>
                                                <li class="page-item<?php if ($i == $pageDoctors) {echo " active";} ?>">
                                                    <a class="page-link" href="Users.php?pageDoctors=<?php echo $i; ?>"> <?php echo $i; ?> </a>
                                                </li>
                                            <?php } ?>
                                            <li class="page-item <?php if ($pageDoctors == $pageDoctors || $pageDoctors == 0) {echo "disabled";} ?>">
                                                <a class="page-link" href="Users.php?pageDoctors=<?php echo $nextDoctors; ?>">Next</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="Users.php?pageDoctors=<?php echo $pagesDoctors; ?>">Last</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-striped table-hover table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Date Of Birth</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">NIC</th>
                                                <th scope="th-sm" id="Action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($doctors as $doctor) { ?>
                                                <tr>
                                                    <th scope="row"><?php echo $doctor['user_id']; ?></th>
                                                    <td id="UserName<?php echo $doctor['user_id']; ?>"> <?php echo $doctor['user_fname'] . " " . $doctor['user_lname']; ?></td>
                                                    <td id="UserAddress<?php echo $doctor['user_id']; ?>"> <?php echo $doctor['user_address']; ?></td>
                                                    <td id="UserDateOfBirth<?php echo $doctor['user_id']; ?>"> <?php echo $doctor['user_dob']; ?></td>
                                                    <td id="UserEmail<?php echo $doctor['user_id']; ?>"> <?php echo $doctor['user_email']; ?></td>
                                                    <td id="UserNIC<?php echo $doctor['user_id']; ?>"> <?php echo $doctor['user_nic']; ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-themed-danger btn-action" name="deleteButton" id="del<?php echo $doctor['user_id'] ?>" onclick="openDeleteModal(this.id)"><i class="fa-solid fa-trash-can"></i>&nbsp;Delete</button>
                                                        <button type="button" class="btn btn-sm btn-themed-info" name="editButton" id="edit<?php echo $doctor['user_id'] ?>" onclick="openEditModal(this.id)"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Edit</button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <form action="#" method="post" class="limitSelectDoctorsForm">
                                    <label>Records per page:</label>
                                    <select id="limitSelectorDoctors" name="limitSelectorDoctors" class="form-select limitSelect" onchange="changeDoctorsLimits()">
                                        <option <?php if($limitDoctors == 5){ echo "selected"; } ?> value="5">5</option>
                                        <option <?php if($limitDoctors == 10){ echo "selected"; } ?> value="10">10</option>
                                        <option <?php if($limitDoctors == 20){ echo "selected"; } ?> value="20">20</option>
                                        <option <?php if($limitDoctors == 50){ echo "selected"; } ?> value="50">50</option>
                                        <option <?php if($limitDoctors == 100){ echo "selected"; } ?> value="100">100</option>
                                    </select>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-12">&nbsp;</div>
                                <div class="col-12">&nbsp;</div>
                                <div class="col-12">&nbsp;</div>
                            </div>

                        </section>

                        <!-- Patients -->

                        <section>

                            <div class="row">
                                <div class="col-12">
                                    <h2 class="TitleTxt">Patients</h2>
                                </div>
                            </div>                          
                            <div class="row">
                                <div class="col-12">
                                    <nav class="paginationNav">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="Users.php?pagePatients=1">First</a>
                                            </li>
                                            <li class="page-item <?php if ($pagePatients == 1 || $pagePatients == 0) {echo "disabled";} ?>">
                                                <a class="page-link" href="Users.php?pagePatients=<?php echo $previousPatients; ?>">Previous</a>
                                            </li>
                                            <?php for ($i = 1; $i <= $pagesPatients; $i++) { ?>
                                                <li class="page-item<?php if ($i == $pagePatients) {echo " active";} ?>">
                                                    <a class="page-link" href="Users.php?pagePatients=<?php echo $i; ?>"> <?php echo $i; ?> </a>
                                                </li>
                                            <?php } ?>
                                            <li class="page-item <?php if ($pagePatients == $pagePatients || $pagePatients == 0) {echo "disabled";} ?>">
                                                <a class="page-link" href="Users.php?pagePatients=<?php echo $nextPatients; ?>">Next</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="Users.php?pagePatients=<?php echo $pagesPatients; ?>">Last</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-striped table-hover table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Date Of Birth</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">NIC</th>
                                                <th scope="th-sm" id="Action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($patients as $patient) { ?>
                                                <tr>
                                                    <th scope="row"><?php echo $patient['user_id']; ?></th>
                                                    <td id="UserName<?php echo $patient['user_id']; ?>"> <?php echo $patient['user_fname'] . " " . $patient['user_lname']; ?></td>
                                                    <td id="UserAddress<?php echo $patient['user_id']; ?>"> <?php echo $patient['user_address']; ?></td>
                                                    <td id="UserDateOfBirth<?php echo $patient['user_id']; ?>"> <?php echo $patient['user_dob']; ?></td>
                                                    <td id="UserEmail<?php echo $patient['user_id']; ?>"> <?php echo $patient['user_email']; ?></td>
                                                    <td id="UserNIC<?php echo $patient['user_id']; ?>"> <?php echo $patient['user_nic']; ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-themed-danger btn-action" name="deleteButton" id="del<?php echo $patient['user_id'] ?>" onclick="openDeleteModal(this.id)"><i class="fa-solid fa-trash-can"></i>&nbsp;Delete</button>
                                                        <button type="button" class="btn btn-sm btn-themed-info" name="editButton" id="edit<?php echo $patient['user_id'] ?>" onclick="openEditModal(this.id)"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Edit</button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <form action="#" method="post" class="limitSelectPatientsForm">
                                    <label>Records per page:</label>
                                    <select id="limitSelectorPatients" name="limitSelectorPatients" class="form-select limitSelect" onchange="changePatientsLimits()">
                                        <option <?php if($limitPatients == 5){ echo "selected"; } ?> value="5">5</option>
                                        <option <?php if($limitPatients == 10){ echo "selected"; } ?> value="10">10</option>
                                        <option <?php if($limitPatients == 20){ echo "selected"; } ?> value="20">20</option>
                                        <option <?php if($limitPatients == 50){ echo "selected"; } ?> value="50">50</option>
                                        <option <?php if($limitPatients == 100){ echo "selected"; } ?> value="100">100</option>
                                    </select>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-12">&nbsp;</div>
                                <div class="col-12">&nbsp;</div>
                                <div class="col-12">&nbsp;</div>
                            </div>

                        </section>

                        <!-- Clerks -->

                        <section>

                            <div class="row">
                                <div class="col-12">
                                    <h2 class="TitleTxt">Clerks</h2>
                                </div>
                            </div>                           
                            <div class="row">
                                <div class="col-12">
                                    <nav class="paginationNav">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="Users.php?pageClerks=1">First</a>
                                            </li>
                                            <li class="page-item <?php if ($pageClerks == 1 || $pageClerks == 0) {echo "disabled";} ?>">
                                                <a class="page-link" href="Users.php?pageClerks=<?php echo $previousClerks; ?>">Previous</a>
                                            </li>
                                            <?php for ($i = 1; $i <= $pagesClerks; $i++) { ?>
                                                <li class="page-item<?php if ($i == $pageClerks) {echo " active";} ?>">
                                                    <a class="page-link" href="Users.php?pageClerks=<?php echo $i; ?>"> <?php echo $i; ?> </a>
                                                </li>
                                            <?php } ?>
                                            <li class="page-item <?php if ($pageClerks == $pageClerks || $pageClerks == 0) {echo "disabled";} ?>">
                                                <a class="page-link" href="Users.php?pageClerks=<?php echo $nextClerks; ?>">Next</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="Users.php?pageClerks=<?php echo $pagesClerks; ?>">Last</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-striped table-hover table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Date Of Birth</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">NIC</th>
                                                <th scope="th-sm" id="Action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($clerks as $clerk) { ?>
                                                <tr>
                                                    <th scope="row"><?php echo $clerk['user_id']; ?></th>
                                                    <td id="UserName<?php echo $clerk['user_id']; ?>"> <?php echo $clerk['user_fname'] . " " . $clerk['user_lname']; ?></td>
                                                    <td id="UserAddress<?php echo $clerk['user_id']; ?>"> <?php echo $clerk['user_address']; ?></td>
                                                    <td id="UserDateOfBirth<?php echo $clerk['user_id']; ?>"> <?php echo $clerk['user_dob']; ?></td>
                                                    <td id="UserEmail<?php echo $clerk['user_id']; ?>"> <?php echo $clerk['user_email']; ?></td>
                                                    <td id="UserNIC<?php echo $clerk['user_id']; ?>"> <?php echo $clerk['user_nic']; ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-themed-danger btn-action" name="deleteButton" id="del<?php echo $clerk['user_id'] ?>" onclick="openDeleteModal(this.id)"><i class="fa-solid fa-trash-can"></i>&nbsp;Delete</button>
                                                        <button type="button" class="btn btn-sm btn-themed-info" name="editButton" id="edit<?php echo $clerk['user_id'] ?>" onclick="openEditModal(this.id)"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Edit</button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <form action="#" method="post" class="limitSelectClerksForm">
                                    <label>Records per page:</label>
                                    <select id="limitSelectorClerks" name="limitSelectorClerks" class="form-select limitSelect" onchange="changeClerksLimits()">
                                        <option <?php if($limitClerks == 5){ echo "selected"; } ?> value="5">5</option>
                                        <option <?php if($limitClerks == 10){ echo "selected"; } ?> value="10">10</option>
                                        <option <?php if($limitClerks == 20){ echo "selected"; } ?> value="20">20</option>
                                        <option <?php if($limitClerks == 50){ echo "selected"; } ?> value="50">50</option>
                                        <option <?php if($limitClerks == 100){ echo "selected"; } ?> value="100">100</option>
                                    </select>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-12">&nbsp;</div>
                                <div class="col-12">&nbsp;</div>
                                <div class="col-12">&nbsp;</div>
                            </div>

                        </section>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Modals -->

    <?php

        include_once "UsersAddUserModal.php";
        include_once "UsersEditUserModal.php";
        include_once "UsersDeleteUserModal.php";

    ?>

    <!-- Modals end-->

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
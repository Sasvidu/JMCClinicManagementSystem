<?php

require_once "../Model/Session.php";
require_once "../Model/InventoryInitializationModel.php"

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
    <link rel="stylesheet" type="text/css" href="../CSS/InventoryStyles.css">
	<link rel="stylesheet" type="text/css" href="../CSS/AdminDashboardStyles.css">
    <link rel="stylesheet" type="text/css" href="../CSS/CommonDashboardStyles.css">
    <link rel="stylesheet" type="text/css" href="../CSS/Utilities.css">

    <!--Link to Original Script -->
    <script defer src="../JS/InventoryJS.js"></script>

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

                        <div class="col-12 dashboard-item dashboard-selected-item">

                            <img src="../Commons/icons/bg-removed/inventory-white.png" class="dashboard-item-image">
                            <span class="dashboard-item-text">&nbsp;&nbsp;&nbsp;Inventory</span>

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
                                &nbsp;
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-8">

                                <nav class="paginationNav">
                                    <ul class="pagination">

                                        <li class="page-item">
                                            <a class="page-link" href="Inventory.php?page=1">First</a>
                                        </li>

                                        <li class="page-item <?php if ($page == 1 || $page == 0) {echo "disabled";} ?>">
                                            <a class="page-link" href="Inventory.php?page=<?php echo $previous; ?>">Previous</a>
                                        </li>

                                        <?php for ($i = 1; $i <= $pages; $i++) { ?>

                                            <li class="page-item<?php if ($i == $page) {echo " active";} ?>">
                                                <a class="page-link" href="Inventory.php?page=<?php echo $i; ?>"> <?php echo $i; ?> </a>
                                            </li>

                                        <?php } ?>

                                        <li class="page-item <?php if ($page == $pages || $page == 0) {echo "disabled";} ?>">
                                            <a class="page-link" href="Inventory.php?page=<?php echo $next; ?>">Next</a>
                                        </li>

                                        <li class="page-item">
                                            <a class="page-link" href="Inventory.php?page=<?php echo $pages; ?>">Last</a>
                                        </li>

                                    </ul>
                                </nav>

                            </div>

                            <div class="col-1">
                                <button type="button" class="btn btn-block btn-themed-success btn-add-stock" name="addStockButton" id="addStockButton" data-toggle="modal" data-target="#AddStockModal"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Stock</button>
                            </div>

                            <div class="col-1">
                                <button type="button" class="btn btn-block btn-themed-success btn-place-order" name="viewOrderButton" id="viewOrderButton"><i class="fa-solid fa-list"></i>&nbsp;&nbsp;View Orders</button>
                            </div>

                            <div class="col-2 searchbar">
                                <form action="" method="get">
                                    <div class="input-group mb-3">
                                        <input id="search" name="search" value="<?php if (isset($_GET["search"])) {echo $_GET["search"];} ?>" type="text" class="form-control" placeholder="Search for data">
                                        <button type="submit" class="btn btn-themed-primary">Search</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-12">
                                &nbsp;
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12">

                                <table class="table table-striped table-hover table-bordered table-responsive">

                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Batch No.</th>
                                            <th scope="col">Company</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Current Qty</th>
                                            <th scope="col">Max Qty</th>
                                            <th scope="col">Buffer Qty</th>
                                            <th scope="col">Last Updated Date</th>
                                            <th scope="col">Created Date</th>
                                            <th scope="th-sm" id="Action">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php foreach ($stocks as $stock) { ?>
                                            <tr>
                                                <th scope="row"><?php echo $stock['stock_id']; ?></th>
                                                <td id="MedicineName<?php echo $stock['stock_id']; ?>"> <?php echo $stock['medicine_name']; ?></td>
                                                <td id="MedicineBatch<?php echo $stock['stock_id']; ?>"> <?php echo $stock['medicine_batch_no']; ?></td>
                                                <td id="MedicineCompany<?php echo $stock['stock_id']; ?>"> <?php echo $stock['medicine_company']; ?></td>
                                                <td id="MedicineCategory<?php echo $stock['stock_id']; ?>"> <?php echo $stock['medicine_category']; ?></td>
                                                <td id="StockCurrent<?php echo $stock['stock_id']; ?>"> <?php echo $stock['stock_qty_current']; ?></td>
                                                <td id="StockMax<?php echo $stock['stock_id']; ?>"> <?php echo $stock['stock_qty_max']; ?></td>
                                                <td id="StockBuffer<?php echo $stock['stock_id']; ?>"> <?php echo $stock['stock_qty_buffer']; ?></td>
                                                <td id="StockUpdatedDate<?php echo $stock['stock_id']; ?>"> <?php echo $stock['stock_updated_date']; ?></td>
                                                <td id="StockCreatedDate<?php echo $stock['stock_id']; ?>"> <?php echo $stock['stock_created_date']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-success" name="orderButton" id="order<?php echo $stock['stock_id'] ?>" onclick="openOrderModal(this.id)"><i class="fa-solid fa-box-open"></i>&nbsp;Order</button>
                                                    <button type="button" class="btn btn-sm btn-themed-info" name="editButton" id="edit<?php echo $stock['stock_id'] ?>" onclick="openEditModal(this.id)"><i class="fa-solid fa-pen-to-square"></i>&nbsp;Edit</button>
                                                    <button type="button" class="btn btn-sm btn-themed-danger btn-action" name="deleteButton" id="del<?php echo $stock['stock_id'] ?>" onclick="openDeleteModal(this.id)"><i class="fa-solid fa-trash-can"></i>&nbsp;Delete</button>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>

                                </table>

                            </div>
                        </div>

                        <div class="row">

                            <form action="#" method="post" class="limitSelectForm">

                                <label>Records per page:</label>
                                <select id="limitSelector" name="limitSelector" class="form-select limitSelect" onchange="changeLimits()">
                                    <option <?php if($limit == 5){ echo "selected"; } ?> value="5">5</option>
                                    <option <?php if($limit == 10){ echo "selected"; } ?> value="10">10</option>
                                    <option <?php if($limit == 20){ echo "selected"; } ?> value="20">20</option>
                                    <option <?php if($limit == 50){ echo "selected"; } ?> value="50">50</option>
                                    <option <?php if($limit == 100){ echo "selected"; } ?> value="100">100</option>
                                </select>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Modals -->

    <?php

        include_once "InventoryAddStockModal.php";
        include_once "InventoryEditStockModal.php";
        include_once "InventoryDeleteStockModal.php";
        include_once "InventoryPlaceOrderModal.php";

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
<?php

require_once "../Commons/JeevaniDB.php";
$thisDBConnection = new DbConnection();
$myCon = $thisDBConnection->con;

$sqla = "SELECT * FROM supplier WHERE supplier_status=1 ORDER BY supplier_name;";
$resulta = $myCon->query($sqla) or die($myCon->error);
$resChecka = mysqli_num_rows($resulta);

if ($resChecka > 0) {
    $suppliers = $resulta->fetch_all(MYSQLI_ASSOC);
} else {
    $msg = "Error: Something went wrong, please try contact your troubleshooting manager";
    echo "<br><p align='center'>$msg</p>";
    exit();
}

?>

<div id="PlaceOrderModal" class="modal fade" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="../Controller/InventoryPlaceOrderModalController.php?status=true" method="post">

                <div class="modal-header">
                    <h5 id="PlaceOrderModalTitle" class="modal-title">Place an Order</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-12">
                            <label>Medicine Id:</label>
                            <div class="col-12">
                                <input id="MedicineId" name="MedicineId" type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-12">&nbsp;</div>

                        <div class="col-12">
                            <label>Supplier name:</label>
                            <select id="Supplier" name="Supplier" class="form-select" aria-label="Default select example">
                                <option selected value="Unspecified">Select a Supplier</option>
                                <?php foreach ($suppliers as $supplier) { ?>

                                    <option value="<?php echo $supplier['supplier_id'] ?>"><?php echo $supplier['supplier_name'] . ", " . $supplier['supplier_origin'] . "; Specialising in " . $supplier['supplier_specialisation'] ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12">&nbsp;</div>

                        <div class="col-12">
                            <label>Order Date:</label>
                            <input id="OrderDate" name="OrderDate" type="date" class="form-control" placeholder="Enter the order date">
                        </div>
                        <div class="col-12">&nbsp;</div>

                        <div class="col-12">
                            <label>Order quantity:</label>
                            <input id="Qty" name="Qty" type="number" min="0" class="form-control" placeholder="Enter the quantity of medicines ordered">
                        </div>
                        <div class="col-12">&nbsp;</div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Place Order</button>
                    </div>

            </form>

        </div>
    </div>
</div>
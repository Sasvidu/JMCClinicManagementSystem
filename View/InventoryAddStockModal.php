<?php

require_once "../Commons/JeevaniDB.php";
$thisDBConnection = new DbConnection();
$myCon = $thisDBConnection->con;

$sql = "SELECT * FROM medicine WHERE medicine_status=1 AND medicine_stock_status=0 ORDER BY medicine_category, medicine_name;";
$result = $myCon->query($sql) or die($myCon->error);
$resCheck = mysqli_num_rows($result);

if ($resCheck > 0) {
    $medicines = $result->fetch_all(MYSQLI_ASSOC);
} else if ($resCheck == 0) {
    $medicines = array("medicine_id" => "0", "medicine_name" => "No medicines availabe");
} else {
    $msg = "Stocks have been created for all medicines.";
    echo "<br><p align='center'>$msg</p>";
    exit();
}

?>

<div id="AddStockModal" class="modal fade" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="../Controller/InventoryAddStockModalController.php?status=true" method="post">

                <div class="modal-header">
                    <h5 id="AddStockModalTitle" class="modal-title">Create a new stock</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-12">&nbsp;</div>
                        <div class="col-12">

                            <label>Medicine to create the stock for:</label>
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
                                                                        } ?> </option>

                                <?php } ?>
                            </select>

                        </div>
                        <div class="col-12">&nbsp;</div>

                        <div class="col-12">
                            <label>Maximum quantity:</label>
                            <input id="MaxQty" name="MaxQty" type="number" min="0" class="form-control" placeholder="Enter the maximum quantity which can be held in stock">
                        </div>
                        <div class="col-12">&nbsp;</div>

                        <div class="col-12">
                            <label>Re-order quantity:</label>
                            <input id="BufferQty" name="BufferQty" type="number" min="0" class="form-control" placeholder="Enter the buffer inventory level">
                        </div>
                        <div class="col-12">&nbsp;</div>

                        <div class="col-12">
                            <label>Date of creation:</label>
                            <input id="Date" name="Date" type="date" class="form-control" placeholder="Enter stock creation date">
                        </div>
                        <div class="col-12">&nbsp;</div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create Stock</button>
                </div>

            </form>

        </div>
    </div>
</div>
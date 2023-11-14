<div id="MakePaymentModal" class="modal fade" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="../Controller/SuppliersMakePaymentModalController.php?status=true" method="post">

                <div class="modal-header">
                    <h5 id="MakePaymentModalTitle" class="modal-title">Make a payment</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-12">
                            <label>Supplier Id:</label>
                            <input id="SupplierId" name="SupplierId" type="text" class="form-control" readonly>
                        </div>
                        <div class="col-12">&nbsp;</div>

                        <div class="col-12">
                            <label>Payment Amount:</label>
                            <input id="PaymentAmount" name="PaymentAmount" type="number" min="0.00" step=".01" class="form-control" placeholder="000000.00">
                        </div>
                        <div class="col-12">&nbsp;</div>

                        <div class="col-12">
                            <label>Payment Date:</label>
                            <input id="PaymentDate" name="PaymentDate" type="date" class="form-control" placeholder="Enter the payment date">
                        </div>
                        <div class="col-12">&nbsp;</div>

                        <div class="col-12">

                            <label>Order Id: (Optional)</label>

                            <?php

                            $sql = "SELECT * FROM stockorder JOIN medicine ON stockorder.order_medicine_id = medicine.medicine_id WHERE order_status=1 AND order_price > order_completed_payment;";
                            $result = $myCon->query($sql) or die($myCon->error);
                            $resCheck = mysqli_num_rows($result);

                            if ($resCheck > 0) {
                                $orders = $result->fetch_all(MYSQLI_ASSOC);
                            } else if ($resCheck == 0) {
                                $orders = array("order_id" => "0");
                            } else {
                                $msg = "Error: Something went wrong, please try contact your troubleshooting manager";
                                echo "<br><p align='center'>$msg</p>";
                                exit();
                            }

                            ?>

                            <select id="OrderId" name="OrderId" class="form-select" aria-label="Default select example">
                                <option selected value="Unspecified">Select an order: [Id, Date, Medicine Data, Quantity]</option>
                                <?php foreach ($orders as $order) { ?>

                                    <option value="<?php if ($order['order_id'] == 0) {
                                                        echo "Unspecified";
                                                    } else {
                                                        echo $order['order_id'];
                                                    } ?>"><?php if ($order['order_id'] == 0) {
                                                                echo "Unspecified";
                                                            } else {
                                                                echo $order['order_id'];
                                                            } ?>, <?php if ($order['order_id'] == 0) {
                                                                echo "Unspecified";
                                                            } else {
                                                                echo $order['order_date'];
                                                            } ?>, <?php if ($order['order_id'] == 0) {
                                                                echo "Unspecified";
                                                            } else {
                                                                echo $order['medicine_name'];
                                                            } ?>, <?php if ($order['order_id'] == 0) {
                                                                echo "Unspecified";
                                                            } else {
                                                                echo $order['medicine_batch_no'];
                                                            } ?>, <?php if ($order['order_id'] == 0) {
                                                                echo "Unspecified";
                                                            } else {
                                                                echo $order['medicine_company'];
                                                            } ?>, <?php if ($order['order_id'] == 0) {
                                                                echo "Unspecified";
                                                            } else {
                                                                echo $order['medicine_category'];
                                                            } ?>, <?php if ($order['order_id'] == 0) {
                                                                echo "Unspecified";
                                                            } else {
                                                                echo $order['order_qty'];
                                                            } ?></option>

                                <?php } ?>
                            </select>

                        </div>
                        <div class="col-12">&nbsp;</div>

                        <div class="col-12">
                            <label>Payment Comment (Mandatory if no order selected):</label>
                            <input id="PaymentComment" name="PaymentComment" type="text" class="form-control" placeholder="Ex: Settlement of overdue interest">
                        </div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Make Payment</button>
                </div>

            </form>

        </div>
    </div>
</div>
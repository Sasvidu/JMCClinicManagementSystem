            <div id="AddSupplierModal" class="modal fade" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!-- The form points to the controller for the specific modal  -->
                        <form action="../Controller/SuppliersAddSupplierModalController.php?status=true" method="post">

                            <div class="modal-header">
                                <h5 id="NewMedicineModalTitle" class="modal-title">Add a new supplier</h5>
                                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-12">
                                        &nbsp;
                                    </div>

                                    <!-- Field for Supplier Name -->
                                    <div class="col-12">

                                        <label>Supplier Name:</label>
                                        <input id="Name" name="Name" type="text" class="form-control" placeholder="Enter the name of the supplier">

                                    </div>

                                    <div class="col-12">
                                        &nbsp;
                                    </div>

                                    <!-- Field for Supplier Origin -->
                                    <div class="col-12">

                                        <label>Supplier Origin:</label>
                                        <input id="Origin" name="Origin" type="text" class="form-control" placeholder="Enter the location of the supplier">

                                    </div>

                                    <div class="col-12">
                                        &nbsp;
                                    </div>

                                    <!-- Field for Supplier Specialisation -->
                                    <div class="col-12">

                                        <label>Supplier Specialisation:</label>
                                        <input id="Specialisation" name="Specialisation" type="text" class="form-control" placeholder="Enter the specialisation of the supplier">

                                    </div>

                                    <div class="col-12">
                                        &nbsp;
                                    </div>

                                </div>

                            </div>

                            <!-- Confirmation buttons -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Supplier</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
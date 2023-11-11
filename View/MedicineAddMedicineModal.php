            <div id="AddMedicineModal" class="modal fade" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!-- The form points to the controller for the specific modal  -->
                        <form action="../Controller/MedicineAddMedicineModalController.php?status=true" method="post">

                            <div class="modal-header">
                                <h5 id="NewMedicineModalTitle" class="modal-title">Add a new medicine</h5>
                                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-12">
                                        &nbsp;
                                    </div>

                                    <!-- Field for Medicine Category -->
                                    <div class="col-12">

                                        <label>Medicine Category:</label>
                                        <select id="Category" name="Category" class="form-select" aria-label="Default select example">
                                            <option selected value="Unspecified">Select a Category</option>
                                            <option value="Tablet">Tablet</option>
                                            <option value="Capsule">Capsule</option>
                                            <option value="Syrup">Syrup</option>
                                            <option value="Injection">Injection</option>
                                            <option value="Cream">Cream</option>
                                            <option value="Ointment">Ointment</option>
                                            <option value="Other">Other</option>
                                        </select>

                                    </div>

                                    <div class="col-12">
                                        &nbsp;
                                    </div>

                                    <!-- Field for Medicine Brand -->
                                    <div class="col-12">

                                        <label>Medicine Brand:</label>
                                        <input id="Brand" name="Brand" type="text" class="form-control" placeholder="Enter the brand name of the medicine">

                                    </div>

                                    <div class="col-12">
                                        &nbsp;
                                    </div>

                                    <!-- Field for Medicine Company -->
                                    <div class="col-12">

                                        <label>Medicine Company:</label>
                                        <input id="Company" name="Company" type="text" class="form-control" placeholder="Enter the name of the company producing the medicine">

                                    </div>

                                    <div class="col-12">
                                        &nbsp;
                                    </div>

                                    <!-- Field for Medicine Name -->
                                    <div class="col-12">

                                        <label>Medicine Name:</label>
                                        <input id="Name" name="Name" type="text" class="form-control" placeholder="Enter the full name of the medicine">

                                    </div>

                                    <div class="col-12">
                                        &nbsp;
                                    </div>

                                    <!-- Field for Medicine Batch No. -->
                                    <div class="col-12">

                                        <label>Medicine Batch No:</label>
                                        <input id="Batch" name="Batch" type="text" class="form-control" placeholder="Enter the batch number of the medicine">

                                    </div>

                                    <div class="col-12">
                                        &nbsp;
                                    </div>

                                    <!-- Field for Medicine Size -->
                                    <div class="col-12">

                                        <label>Medicine Size:</label>
                                        <input id="Size" name="Size" type="text" class="form-control" placeholder="Enter the quantitave size of the medicine">

                                    </div>

                                    <div class="col-12">
                                        &nbsp;
                                    </div>

                                    <!-- Field for Medicine Price -->
                                    <div class="col-12">

                                        <label>Medicine Price:</label>
                                        <input id="Price" name="Price" type="number" min="0.00" step=".01" class="form-control" placeholder="00000.00">

                                    </div>

                                    <div class="col-12">
                                        &nbsp;
                                    </div>

                                    <!-- Field for Medicine Info -->
                                    <div class="col-12">

                                        <label>Medicine Info:</label>
                                        <textarea id="Info" name="Info" type="file" class="form-control"></textarea>

                                    </div>

                                    <div class="col-12">
                                        &nbsp;
                                    </div>

                                </div>

                            </div>

                            <!-- Confirmation buttons -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Medicine</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
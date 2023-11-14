            <div id="UpdateDoctorModal" class="modal fade" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!-- The form points to the controller for the specific modal  -->
                        <form action="../Controller/DoctorsEditDoctorModalController.php?status=true" method="post">

                            <div class="modal-header">
                                <h5 id="UpdateDoctorModalTitle" class="modal-title">Edit doctor information</h5>
                                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-12">&nbsp;</div>

                                    <!-- Field for Doctor Id -->
                                    <div class="col-12">
                                        <label>Doctor Id:</label>
                                        <input id="DoctorId" name="DoctorId" type="text" class="form-control" readonly>
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                    <!-- Fields for Doctor Name -->
                                    <div class="col-12">
                                        <label>First Name:</label>
                                        <input id="FirstName" name="FirstName" type="text" class="form-control" placeholder="Enter the first name of the doctor">
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                    <div class="col-12">
                                        <label>Last Name:</label>
                                        <input id="LastName" name="LastName" type="text" class="form-control" placeholder="Enter the last name of the doctor">
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                    <!-- Field for Doctor's Specialisation -->
                                    <div class="col-12">
                                        <label>Specialisation:</label>
                                        <input id="Specialisation" name="Specialisation" type="text" class="form-control" placeholder="Enter the doctor's field of expertise">
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                    <!-- Field for Doctor's Qualifications -->
                                    <div class="col-12">
                                        <label>Qualifications:</label>
                                        <textarea id="Qualifications" name="Qualifications" type="file" class="form-control"></textarea>
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                    <!-- Field for Doctor's Experience -->
                                    <div class="col-12">
                                        <label>Experience:</label>
                                        <textarea id="Experience" name="Experience" type="file" class="form-control"></textarea>
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                    <!-- Field for Doctor's User Id -->
                                    <div class="col-12">
                                        <label>Doctor's User Id:</label>
                                        <input id="UserId" name="UserId" type="text" class="form-control" readonly>
                                    </div>
                                    <div class="col-12">&nbsp;</div>
                                    
                                    <!-- Field for Telephone Number -->
                                    <div class="col-12">
                                        <label>Telephone Number:</label>
                                        <input id="TelNo" name="TelNo" type="text" class="form-control" placeholder="Enter the doctor's telephone number">
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                     <!-- Field for Username/Email -->
                                     <div class="col-12">
                                        <label>Username:</label>
                                        <input id="Email" name="Email" type="text" class="form-control" readonly>
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                    <!-- Field for Address -->
                                    <div class="col-12">
                                        <label>Address:</label>
                                        <input id="Address" name="Address" type="text" class="form-control" placeholder="Enter the doctor's residential address">
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                    <!-- Field for Date Of Birth -->
                                    <div class="col-12">
                                        <label>Date Of Birth:</label>
                                        <input id="DateOfBirth" name="DateOfBirth" type="date" class="form-control" placeholder="Enter the doctor's date of birth">
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                    <!-- Field for NIC -->
                                    <div class="col-12">
                                        <label>National Identity Card No:</label>
                                        <input id="NIC" name="NIC" type="text" class="form-control" placeholder="Enter the NIC of the doctor">
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                </div>

                            </div>

                            <!-- Confirmation buttons -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Edit Doctor</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
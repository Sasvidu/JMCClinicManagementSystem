            <div id="AddUserModal" class="modal fade" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <!-- The form points to the controller for the specific modal  -->
                        <form action="../Controller/UsersAddUserModalController.php?status=true" method="post">

                            <div class="modal-header">
                                <h5 id="AddUserModalTitle" class="modal-title">Add a new user</h5>
                                <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-12">&nbsp;</div>

                                    <!-- Fields for User Name -->
                                    <div class="col-12">
                                        <label>First Name:</label>
                                        <input id="FirstName" name="FirstName" type="text" class="form-control" placeholder="Enter the first name of the user">
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                    <div class="col-12">
                                        <label>Last Name:</label>
                                        <input id="LastName" name="LastName" type="text" class="form-control" placeholder="Enter the last name of the user">
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                    <!-- Field for Username(Email) -->
                                    <div class="col-12">
                                        <label>Username:</label>
                                        <input id="Username" name="Username" type="email" class="form-control" placeholder="Enter the user's email">
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                    <!-- Field for Date Of Birth -->
                                    <div class="col-12">
                                        <label>Date Of Birth:</label>
                                        <input id="DateOfBirth" name="DateOfBirth" type="date" class="form-control" placeholder="Enter the user's date of birth">
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                    <!-- Field for Address -->
                                    <div class="col-12">
                                        <label>Address:</label>
                                        <input id="Address" name="Address" type="text" class="form-control" placeholder="Enter the user's residential address">
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                    <!-- Field for NIC -->
                                    <div class="col-12">
                                        <label>National Identity Card No:</label>
                                        <input id="NIC" name="NIC" type="text" class="form-control" placeholder="Enter the NIC of the user">
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                    <!-- Field for User Role -->
                                    <div class="col-12">
                                        <label>Role:</label>
                                        <select id="Role" name="Role" class="form-select">
                                            <option selected value="Unspecified">Select the role of the user</option>
                                            <?php if ($userRole === "Admin") { ?>
                                                <option value="1">Admin</option>
                                            <?php } ?>
                                            <option value="2">Doctor</option>
                                            <option value="3">Clerk</option>
                                            <option value="4">Patient</option>
                                        </select>
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                    <!-- Field for Password -->
                                    <div class="col-12">
                                        <label>Password:</label>
                                        <input id="Password" name="Password" type="text" class="form-control" placeholder="Enter the user's password, caution adviced">
                                    </div>
                                    <div class="col-12">&nbsp;</div>

                                </div>

                            </div>

                            <!-- Confirmation buttons -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add User</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
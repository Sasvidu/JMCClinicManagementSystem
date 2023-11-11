    <div id="ForgotPasswordModal" class="modal fade" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <form action="../Controller/ForgotPasswordModalController.php?status=true" method="post">

                    <div class="modal-header">
                        <h5 id="ForgotPasswordModalTitle" class="modal-title">Reset Password</h5>
                        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="row">

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <div class="col-12">
                                <label>Username:</label>
                                <input id="email" name="email" type="email" class="form-control">
                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <div class="col-12">
                                <label>NIC:</label>
                                <input id="nic" name="nic" type="text" class="form-control">
                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <div class="col-12">
                                <label>New Password:</label>
                                <input id="new-password" name="new-password" type="password" class="form-control"></input>
                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <div class="col-12">
                                <label>Confirm Password:</label>
                                <input id="new-confirm-password" name="new-confirm-password" type="password" class="form-control">
                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                            <div class="col-12 flexer">
                                <button type="submit" class="btn btn-block btn-modal-submit">Change Password</button>
                            </div>

                            <div class="col-12">
                                &nbsp;
                            </div>

                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
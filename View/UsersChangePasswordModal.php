<div id="ChangePasswordUserModal" class="modal fade" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="../Controller/UsersChangePasswordUserModalController.php?status=true" method="post">

                <div class="modal-header">
                    <h5 id="ChangePasswordUserModalTitle" class="modal-title">Change Password</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-12">&nbsp;</div>

                        <div class="col-12">
                            <label>User Id:</label>
                            <input id="Id" name="Id" type="text" class="form-control" readonly>
                        </div>
                        <div class="col-12">&nbsp;</div>

                        <div class="col-12">
                            <label>Password:</label>
                            <div class="col-12 flexer">                                
                                <input id="NewPassword" name="NewPassword" type="password" class="form-control">
                                <i id="eye-icon1" class="fa-solid fa-eye" onclick="showPasswordFunction()"></i>
                            </div>
                        </div>
                        <div class="col-12">&nbsp;</div>

                        <div class="col-12">
                            <label>Confirm Password:</label>
                            <div class="col-12 flexer">                                
                                <input id="RePassword" name="RePassword" type="password" class="form-control">
                                <i id="eye-icon2" class="fa-solid fa-eye" onclick="showRePasswordFunction()"></i>
                            </div>
                        </div>
                        <div class="col-12">&nbsp;</div>

                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>

            </form>

        </div>
    </div>
</div>
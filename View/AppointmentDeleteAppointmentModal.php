<div id="DeleteAppointmentModal" class="modal fade" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- The form points to the controller for the specific modal  -->
            <form action="../Controller/AppointmentDeleteAppointmentModalController.php?status=true" method="post">

                <div class="modal-header">
                    <h5 id="DeleteAppointmentModalTitle" class="modal-title">Delete Appointment</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-12">
                            &nbsp;
                        </div>

                        <!-- Field to store Appointment ID (hidden) -->
                        <div class="col-12">
                            <input id="Id" name="Id" type="text" class="form-control" readonly>
                        </div>

                        <div class="col-12">&nbsp;</div>

                        <div class="col-12">
                            <p align="center" style="font-size:larger">Are you sure you want to delete this Appointment?</p>
                        </div>
                        
                        <div class="col-12">&nbsp;</div>

                    </div>

                </div>

                <!-- Confirmation buttons -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>

            </form>

        </div>
    </div>
</div>
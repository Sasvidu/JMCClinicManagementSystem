          
<div id="UpdateScheduleModal" class="modal fade" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- The form points to the controller for the specific modal  -->
            <form action="../Controller/SchedulesEditScheduleModalController.php?status=true" method="post">

                <div class="modal-header">
                    <h5 id="UpdateScheduleModalTitle" class="modal-title">Edit Schedule</h5>
                    <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-12">&nbsp;</div>

                        <!-- Hidden field for Schedule Id -->
                        <div class="col-12">
                            <input id="Id" name="Id" type="text" class="form-control" readonly>
                        </div>
                        <div class="col-12">&nbsp;</div>

                        <!-- Field for Schedule Start TIme -->
                        <div class="col-12">
                            <label>Starting TIme:</label>
                            <input id="StartTime" name="StartTime" type="time" class="form-control">
                        </div>
                        <div class="col-12">&nbsp;</div>

                        <!-- Field for Schedule End TIme -->
                        <div class="col-12">
                            <label>Ending TIme:</label>
                            <input id="EndTime" name="EndTime" type="time" class="form-control">
                        </div>
                        <div class="col-12">&nbsp;</div>

                    </div>

                </div>

                <!-- Confirmation buttons -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Schedule</button>
                </div>

            </form>

        </div>
    </div>
</div>
function openDeleteModal(id) {
  $(document).ready(function () {
    var fields = id.split("l");
    var appointmentId = fields[1];

    $("#DeleteAppointmentModal").modal();
    $(".modal-body #Id").val(appointmentId);
  });
}

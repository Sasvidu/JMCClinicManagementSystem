function openDeleteModal(id) {
  $(document).ready(function () {
    var fields = id.split("l");
    var appointmentId = fields[1];

    $("#DeleteAppointmentModal").modal();
    $(".modal-body #Id").val(appointmentId);
  });
}

function openMedicalInfoPage(id) {
  $(document).ready(function () {
    var fields = id.split("o");
    var Id = fields[1];

    // Construct the URL
    var url = "PatientMedicalInfo.php?id=" + Id;

    // Open a new tab with the URL
    window.open(url, "_blank");
  });
}

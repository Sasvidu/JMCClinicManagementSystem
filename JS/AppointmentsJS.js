function changeLimits() {
  $(document).ready(function () {
    var limit = document.getElementById("limitSelector");
    limit = limit.value;

    $(".limitSelectForm").submit();
  });
}

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

function openAddPrescriptionModal(id) {
  $(document).ready(function () {
    var fields = id.split("n");
    var appointmentId = fields[1];

    $("#AddPrescriptionModal").modal();
    $(".modal-body #Appointment").val(appointmentId);
  });
}

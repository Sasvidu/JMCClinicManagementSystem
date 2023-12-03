function openDeleteModal(id) {
  $(document).ready(function () {
    var fields = id.split("l");
    var prescriptionId = fields[1];

    $("#DeletePrescriptionModal").modal();
    $(".modal-body #Id").val(prescriptionId);
  });
}

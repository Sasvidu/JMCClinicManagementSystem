function openEditModal(id) {
  $(document).ready(function () {
    var fields = id.split("t");
    var doctorId = fields[1];

    var doctorName = "DoctorName";
    doctorName = doctorName.concat(doctorId);
    doctorName = document.getElementById(doctorName).innerText;

    var names = doctorName.split(" ");
    var doctorFirstName = names[0];
    var doctorLastName = names[1];

    var doctorSpecialisation = "DoctorSpecialisation";
    doctorSpecialisation = doctorSpecialisation.concat(doctorId);
    doctorSpecialisation =
      document.getElementById(doctorSpecialisation).innerText;

    var doctorQualifications = "DoctorQualifications";
    doctorQualifications = doctorQualifications.concat(doctorId);
    doctorQualifications = document.getElementById(doctorQualifications).value;

    var doctorExperience = "DoctorExperience";
    doctorExperience = doctorExperience.concat(doctorId);
    doctorExperience = document.getElementById(doctorExperience).value;

    var doctorUserId = "DoctorUserId";
    doctorUserId = doctorUserId.concat(doctorId);
    doctorUserId = document.getElementById(doctorUserId).innerText;

    var doctorTelNo = "DoctorTelNo";
    doctorTelNo = doctorTelNo.concat(doctorId);
    doctorTelNo = document.getElementById(doctorTelNo).innerText;

    var doctorEmail = "DoctorEmail";
    doctorEmail = doctorEmail.concat(doctorId);
    doctorEmail = document.getElementById(doctorEmail).innerText;

    var doctorAddress = "DoctorAddress";
    doctorAddress = doctorAddress.concat(doctorId);
    doctorAddress = document.getElementById(doctorAddress).value;

    var doctorDateOfBirth = "DoctorDateOfBirth";
    doctorDateOfBirth = doctorDateOfBirth.concat(doctorId);
    doctorDateOfBirth = document.getElementById(doctorDateOfBirth).innerText;

    var doctorNIC = "DoctorNIC";
    doctorNIC = doctorNIC.concat(doctorId);
    doctorNIC = document.getElementById(doctorNIC).innerText;

    $("#UpdateDoctorModal").modal();
    $(".modal-body #DoctorId").val(doctorId);
    $(".modal-body #FirstName").val(doctorFirstName);
    $(".modal-body #LastName").val(doctorLastName);
    $(".modal-body #Specialisation").val(doctorSpecialisation);
    $(".modal-body #Qualifications").val(doctorQualifications);
    $(".modal-body #Experience").val(doctorExperience);
    $(".modal-body #UserId").val(doctorUserId);
    $(".modal-body #TelNo").val(doctorTelNo);
    $(".modal-body #Email").val(doctorEmail);
    $(".modal-body #Address").val(doctorAddress);
    $(".modal-body #DateOfBirth").val(doctorDateOfBirth);
    $(".modal-body #NIC").val(doctorNIC);
  });
}

function openDeleteModal(id) {
  $(document).ready(function () {
    var fields = id.split("l");
    var doctorId = fields[1];

    var doctorUserId = "DoctorUserId";
    doctorUserId = doctorUserId.concat(doctorId);
    doctorUserId = document.getElementById(doctorUserId).innerText;

    $("#DeleteDoctorModal").modal();
    $(".modal-body #Id").val(doctorId);
    $(".modal-body #UserId").val(doctorUserId);
  });
}

function changeLimits() {
  $(document).ready(function () {
    var limit = document.getElementById("limitSelector");
    limit = limit.value;

    $(".limitSelectForm").submit();
  });
}

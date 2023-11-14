function changeAdminsLimits() {
  $(document).ready(function () {
    var limit = document.getElementById("limitSelectorAdmins");
    limit = limit.value;

    $(".limitSelectAdminsForm").submit();
  });
}

function changeDoctorsLimits() {
  $(document).ready(function () {
    var limit = document.getElementById("limitSelectorDoctors");
    limit = limit.value;

    $(".limitSelectDoctorsForm").submit();
  });
}

function changePatientsLimits() {
  $(document).ready(function () {
    var limit = document.getElementById("limitSelectorPatients");
    limit = limit.value;

    $(".limitSelectPatientsForm").submit();
  });
}

function changeClerksLimits() {
  $(document).ready(function () {
    var limit = document.getElementById("limitSelectorClerks");
    limit = limit.value;

    $(".limitSelectClerksForm").submit();
  });
}

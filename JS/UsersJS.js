function openEditModal(id) {
  $(document).ready(function () {
    //Extract the data of specific stock:
    var fields = id.split("t");
    var userId = fields[1];

    var userName = "UserName";
    userName = userName.concat(userId);
    userName = document.getElementById(userName).innerText;

    var names = userName.split(" ");
    var userFirstName = names[0];
    var userLastName = names[1];

    var userAddress = "UserAddress";
    userAddress = userAddress.concat(userId);
    userAddress = document.getElementById(userAddress).innerText;

    var userDateOfBirth = "UserDateOfBirth";
    userDateOfBirth = userDateOfBirth.concat(userId);
    userDateOfBirth = document.getElementById(userDateOfBirth).innerText;

    var userEmail = "UserEmail";
    userEmail = userEmail.concat(userId);
    userEmail = document.getElementById(userEmail).innerText;

    var userNIC = "UserNIC";
    userNIC = userNIC.concat(userId);
    userNIC = document.getElementById(userNIC).innerText;

    //Open the edit user model and set its field values to one's read from the stock record:
    $("#UpdateUserModal").modal();
    $(".modal-body #Id").val(userId);
    $(".modal-body #FirstName").val(userFirstName);
    $(".modal-body #LastName").val(userLastName);
    $(".modal-body #Username").val(userEmail);
    $(".modal-body #DateOfBirth").val(userDateOfBirth);
    $(".modal-body #Address").val(userAddress);
    $(".modal-body #NIC").val(userNIC);
  });
}

function openDeleteModal(id) {
  $(document).ready(function () {
    var fields = id.split("l");
    var Id = fields[1];

    $("#DeleteUserModal").modal();
    $(".modal-body #Id").val(Id);
  });
}

function openChangePasswordModal(id) {
  $(document).ready(function () {
    var fields = id.split("d");
    var Id = fields[1];

    $("#ChangePasswordUserModal").modal();
    $(".modal-body #Id").val(Id);
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

function showPasswordFunction() {
  passwordField = document.getElementById("NewPassword");
  icon = document.getElementById("eye-icon1");

  if (passwordField.type == "password") {
    passwordField.type = "text";
    icon.className = "fa-solid fa-eye-slash";
  } else if (passwordField.type == "text") {
    passwordField.type = "password";
    icon.className = "fa-solid fa-eye";
  }
}

function showRePasswordFunction() {
  passwordField = document.getElementById("RePassword");
  icon = document.getElementById("eye-icon2");

  if (passwordField.type == "password") {
    passwordField.type = "text";
    icon.className = "fa-solid fa-eye-slash";
  } else if (passwordField.type == "text") {
    passwordField.type = "password";
    icon.className = "fa-solid fa-eye";
  }
}

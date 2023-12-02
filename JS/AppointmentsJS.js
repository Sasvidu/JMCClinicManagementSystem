function openEditModal(id) {
  $(document).ready(function () {
    //Extract the data of specific schedule:
    var fields = id.split("t");
    var scheduleId = fields[1];

    var scheduleStart = "ScheduleStart";
    scheduleStart = scheduleStart.concat(scheduleId);
    scheduleStart = document.getElementById(scheduleStart).innerText;

    var scheduleEnd = "ScheduleEnd";
    scheduleEnd = scheduleEnd.concat(scheduleId);
    scheduleEnd = document.getElementById(scheduleEnd).innerText;

    //Open the edit schedule model and set its field values to one's read from the schedule record:
    $("#UpdateScheduleModal").modal();
    $(".modal-body #Id").val(scheduleId);
    $(".modal-body #StartTime").val(scheduleStart);
    $(".modal-body #EndTime").val(scheduleEnd);
  });
}

function openDeleteModal(id) {
  $(document).ready(function () {
    //Extract the data of specific schedule:
    var fields = id.split("l");
    var scheduleId = fields[1];

    //Open the delete payment model and set its field values to one's read from the schedule record:
    $("#DeleteScheduleModal").modal();
    $(".modal-body #Id").val(scheduleId);
  });
}

//Convert the date format to the one used by the date time picker in the modal:
function formatDate(date) {
  var d = new Date(date),
    month = "" + (d.getMonth() + 1),
    day = "" + d.getDate(),
    year = d.getFullYear();

  if (month.length < 2) month = "0" + month;
  if (day.length < 2) day = "0" + day;

  return [month, day, year].join("/");
}

//Submit the limit change upon change in value:
function changeLimits() {
  $(document).ready(function () {
    var limit = document.getElementById("limitSelector");
    limit = limit.value;

    $(".limitSelectForm").submit();
  });
}

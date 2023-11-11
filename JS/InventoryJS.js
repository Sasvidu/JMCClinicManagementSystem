function openEditModal(id) {
  $(document).ready(function () {
    //Extract the data of specific stock:
    var fields = id.split("t");
    var medicineId = fields[1];

    var medicineName = "MedicineName";
    medicineName = medicineName.concat(medicineId);
    medicineName = document.getElementById(medicineName).innerText;

    var medicineBatch = "MedicineBatch";
    medicineBatch = medicineBatch.concat(medicineId);
    medicineBatch = document.getElementById(medicineBatch).innerText;

    var medicineCompany = "MedicineCompany";
    medicineCompany = medicineCompany.concat(medicineId);
    medicineCompany = document.getElementById(medicineCompany).innerText;

    var medicineCategory = "MedicineCategory";
    medicineCategory = medicineCategory.concat(medicineId);
    medicineCategory = document.getElementById(medicineCategory).innerText;

    var medicineData =
      medicineName +
      ", " +
      medicineBatch +
      ", " +
      medicineCompany +
      ", " +
      medicineCategory;

    var MaxQty = "StockMax";
    MaxQty = MaxQty.concat(medicineId);
    MaxQty = document.getElementById(MaxQty).innerText;

    var BufferQty = "StockBuffer";
    BufferQty = BufferQty.concat(medicineId);
    BufferQty = document.getElementById(BufferQty).innerText;

    var CurrentQty = "StockCurrent";
    CurrentQty = CurrentQty.concat(medicineId);
    CurrentQty = document.getElementById(CurrentQty).innerText;

    var CreateDate = "StockCreatedDate";
    CreateDate = CreateDate.concat(medicineId);
    CreateDate = document.getElementById(CreateDate).innerText;
    CreateDate = formatDate(CreateDate);

    var UpdateDate = "StockUpdatedDate";
    UpdateDate = UpdateDate.concat(medicineId);
    UpdateDate = document.getElementById(UpdateDate).innerText;
    UpdateDate = formatDate(UpdateDate);

    //Open the edit stock model and set its field values to one's read from the stock record:
    $("#UpdateStockModal").modal();
    $(".modal-body #Id").val(medicineId);
    $(".modal-body #MedicineData").val(medicineData);
    $(".modal-body #MaxQty").val(MaxQty);
    $(".modal-body #BufferQty").val(BufferQty);
    $(".modal-body #CurrentQty").val(CurrentQty);
    $(".modal-body #CurrentQty").val(CurrentQty);
    $(".modal-body #CreateDate").val(CreateDate);
    $(".modal-body #UpdateDate").val(UpdateDate);
  });
}

function openDeleteModal(id) {
  $(document).ready(function () {
    //Extract the data of specific stock:
    var fields = id.split("l");
    var medicineId = fields[1];

    //Open the delete stock model and set its field values to one's read from the stock record:
    $("#DeleteStockModal").modal();
    $(".modal-body #Id").val(medicineId);
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

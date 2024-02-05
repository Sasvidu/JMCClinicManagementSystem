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

    var UpdateDate = "StockUpdatedDate";
    UpdateDate = UpdateDate.concat(medicineId);
    UpdateDate = document.getElementById(UpdateDate).innerText;

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

function openOrderModal(id) {
  $(document).ready(function () {
    //Extract the data of specific stock:
    var fields = id.split("r");
    var medicineId = fields[2];

    //Open the delete stock model and set its field values to one's read from the stock record:
    $("#PlaceOrderModal").modal();
    $(".modal-body #MedicineId").val(medicineId);
  });
}

//Generate Order Invoice
function openOrderInvoice(id) {
  var fields = id.split("-");
  var orderId = fields[1];

  window.open("OrderReceipt.php?status=true&id=" + orderId, "_blank");
}

//Submit the limit change upon change in value:
function changeLimits() {
  $(document).ready(function () {
    var limit = document.getElementById("limitSelector");
    limit = limit.value;

    $(".limitSelectForm").submit();
  });
}

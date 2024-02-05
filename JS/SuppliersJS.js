function openEditModal(id) {
  $(document).ready(function () {
    //Extract the data of specific stock:
    var fields = id.split("t");
    var supplierId = fields[1];

    var supplierName = "SupplierName";
    supplierName = supplierName.concat(supplierId);
    supplierName = document.getElementById(supplierName).innerText;

    var supplierOrigin = "SupplierOrigin";
    supplierOrigin = supplierOrigin.concat(supplierId);
    supplierOrigin = document.getElementById(supplierOrigin).innerText;

    var supplierSpecialisation = "SupplierSpecialisation";
    supplierSpecialisation = supplierSpecialisation.concat(supplierId);
    supplierSpecialisation = document.getElementById(
      supplierSpecialisation
    ).innerText;

    //Open the edit stock model and set its field values to one's read from the stock record:
    $("#UpdateSupplierModal").modal();
    $(".modal-body #Id").val(supplierId);
    $(".modal-body #Name").val(supplierName);
    $(".modal-body #Origin").val(supplierOrigin);
    $(".modal-body #Specialisation").val(supplierSpecialisation);
  });
}

function openDeleteModal(id) {
  $(document).ready(function () {
    //Extract the data of specific stock:
    var fields = id.split("l");
    var supplierId = fields[1];

    var supplierPendingPayment = "SupplierPendingPayment";
    supplierPendingPayment = supplierPendingPayment.concat(supplierId);
    supplierPendingPayment = document.getElementById(
      supplierPendingPayment
    ).innerText;

    //Open the delete stock model and set its field values to one's read from the stock record:
    $("#DeleteSupplierModal").modal();
    $(".modal-body #Id").val(supplierId);
    $(".modal-body #PendingPayment").val(supplierPendingPayment);
  });
}

function openPaymentInvoice(id) {
  var fields = id.split("-");
  var paymentId = fields[1];

  window.open("PaymentInvoice.php?status=true&id=" + paymentId, "_blank");
}

function openPaymentModal(id) {
  $(document).ready(function () {
    //Extract the data of specific stock:
    var fields = id.split("t");
    var supplierId = fields[1];

    //Open the delete stock model and set its field values to one's read from the stock record:
    $("#MakePaymentModal").modal();
    $(".modal-body #SupplierId").val(supplierId);
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

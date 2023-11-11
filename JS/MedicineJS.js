function openEditModal(id){
    
    $( document ).ready(function() {

        var fields = id.split("t");
        var medicineId = fields[1];

        var medicineCategory = "MedicineCategory";
        medicineCategory = medicineCategory.concat(medicineId);
        medicineCategory = document.getElementById(medicineCategory).innerText;

        var medicineBrand = "MedicineBrand";
        medicineBrand = medicineBrand.concat(medicineId);
        medicineBrand = document.getElementById(medicineBrand).innerText;

        var medicineCompany = "MedicineCompany";
        medicineCompany = medicineCompany.concat(medicineId);
        medicineCompany = document.getElementById(medicineCompany).innerText;

        var medicineName = "MedicineName";
        medicineName = medicineName.concat(medicineId);
        medicineName = document.getElementById(medicineName).innerText;

        var medicineBatch = "MedicineBatch";
        medicineBatch = medicineBatch.concat(medicineId);
        medicineBatch = document.getElementById(medicineBatch).innerText;

        var medicineSize = "MedicineSize";
        medicineSize = medicineSize.concat(medicineId);
        medicineSize = document.getElementById(medicineSize).innerText;

        var medicinePrice = "MedicinePrice";
        medicinePrice = medicinePrice.concat(medicineId);
        medicinePrice = document.getElementById(medicinePrice).innerText;

        var medicineInfo = "MedicineInfo";
        medicineInfo = medicineInfo.concat(medicineId);
        medicineInfo = document.getElementById(medicineInfo).value;

        $("#EditMedicineModal").modal();
        $(".modal-body #Id").val( medicineId );
        $(".modal-body #Category").val( medicineCategory );
        $(".modal-body #Brand").val( medicineBrand );
        $(".modal-body #Company").val( medicineCompany );
        $(".modal-body #Name").val( medicineName );
        $(".modal-body #Batch").val( medicineBatch );
        $(".modal-body #Size").val( medicineSize );
        $(".modal-body #Price").val( medicinePrice );
        $(".modal-body #Info").val( medicineInfo );
        
    });
  
}

function openDeleteModal(id){
    
    $( document ).ready(function() {

        var fields = id.split("l");
        var medicineId = fields[1];

        $("#DeleteMedicineModal").modal();
        $(".modal-body #Id").val( medicineId );
        
    });
  
}

function changeLimits(){

    $( document ).ready(function() {

        var limit = document.getElementById("limitSelector");
        limit = limit.value;

        $(".limitSelectForm").submit();
        
    });

}

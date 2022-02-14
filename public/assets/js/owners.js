const Owners = {
    createAjax: function(ownerData) {
        return new Promise(function(resolve, reject) {
            $.ajax({
                type: "POST",
                data: {
                    name: ownerData.name,
                    email: ownerData.email
                },
                url: "/api/owner",
                success: function(responseData, textStatus, xhr) {
                    if (201 == xhr.status) {
                        resolve(responseData)
                    }
                    if (500 == xhr.status)
                        reject("Szerver oldali hiba történt!");



                }
            }).done().fail(reject);
        });
    },
    create: function() {
        let ownerData = {
            name: $("#owner-form #owner-name-input").val(),
            email: $("#owner-form #owner-email-input").val()
        }

        this.createAjax(ownerData).then(function(responseData) {

            toastr.success('Új kapcsolattartó hozzáadva!');
            let response = JSON.parse(responseData);


            Owners.setSelectNewOwner(response.data);
            Owners.clearForm();
            Owners.closeModal();



        }).catch(function(createAjaxError) {
            toastr.error(createAjaxError);
            Owners.clearForm();
            Owners.closeModal();


        });
    },
    clearForm: function() {
        $("#owner-form :input").val('');

    },
    closeModal: function() {
        Owners.modal.hide();
    },
    modal: new bootstrap.Modal(document.getElementById('addNewOwnerModal')),
    setSelectNewOwner: function(newOwner) {

        $("#owner-select").append("<option value=\"" + newOwner.id + "\">" +
            newOwner.name + "</option>");

        $("#owner-select").val(newOwner.id);

    }

}

$(document).ready(function() {


    $("#save-new-owner").off().on("click", function() {
        Owners.create();
    });

    $("#add-ower-btn").off().on("click", function() {
        Owners.modal.show();
    });

});
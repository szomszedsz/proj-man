const Projects = {
    delete: function() {
        //make ajax request
    },
}

const Owners = {
    create: function() {
        //make ajax create owner function
    },
    addForm: function() {
        let tpl = '<div class=row><div class="col-12">' +
            '<div class="form-group mt-2">' +
            '<label for="titleInput">Kapcsolattartó Neve</label>' +
            '<input name="name" type="text" class="form-control" id="nameInput"  placeholder="">' +
            '</div>' +
            '<div class="form-group mt-2">' +
            '<label for="titleInput">Kapcsolattartó email címe</label>' +
            '<input name="email" type="text" class="form-control" id="emailInput"  placeholder="">' +
            '</div>' +
            '</div>' +
            '</div>';
        console.log(tpl);
        $("#add-owner-form").after().html(tpl);
    }
}

$(document).ready(function() {
    $("#add-owner").off().on("click", function() {
        Owners.addForm();
    });
});
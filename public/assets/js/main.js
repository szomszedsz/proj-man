const Projects = {
    deleteAjax: function(projectId) {
        return new Promise(function(resolve, reject) {

            $.ajax({
                type: "DELETE",
                url: "/api/project/delete/" + projectId,
                success: function(responseData) {

                    resolve(responseData)


                }
            }).done().fail(reject);
        });
    },
    deleteProject: function(projectId) {
        this.deleteAjax(projectId).then(function(responseData) {
            console.log(responseData);

        }).catch(function(deleteAjaxError) {
            console.error(deleteAjaxError)
        });
    }
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
        try {
            Owners.addForm();
        } catch (e) {
            consle.error(e);
        }
    });


    $("#project-list .delete-project-btn").off().on("click", function() {
        let clickedProjectId = $(this).data("project");
        Projects.deleteProject(clickedProjectId);
    });

    $("#save-new-owner").off().on('click', function() {
        alert('klakkk');
    });

});
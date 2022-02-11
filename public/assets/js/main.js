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
    createAjax: function(ownerData) {
        return new Promise(function(resolve, reject) {
            $.ajax({
                type: "POST",
                data: {
                    name: ownerData.name,
                    email: ownerData.email
                },
                url: "/api/owner",
                success: function(responseData) {

                    resolve(responseData)


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
            console.log(responseData);

        }).catch(function(deleteAjaxError) {
            console.error(deleteAjaxError)
        });
    }

}

$(document).ready(function() {

    $("#project-list .delete-project-btn").off().on("click", function() {
        let clickedProjectId = $(this).data("project");
        Projects.deleteProject(clickedProjectId);
    });

    $("#save-new-owner").off().on('click', function() {
        Owners.create();
    });

});
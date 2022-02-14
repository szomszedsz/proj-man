const Projects = {
    deleteAjax: function(projectId) {
        return new Promise(function(resolve, reject) {

            $.ajax({
                type: "DELETE",
                url: "/api/project/delete/" + projectId,
                success: function(responseData, textStatus, xhr) {

                    if (200 == xhr.status) {
                        resolve(responseData)
                    } else {
                        reject(responseData);
                    }


                }
            }).done().fail(reject);
        });
    },
    deleteProject: function(projectId) {
        this.deleteAjax(projectId).then(function(responseData) {

            toastr.success('Project törölve!');
            Projects.removeProject(projectId);


        }).catch(function(deleteAjaxError) {
            console.error(deleteAjaxError)
        });
    },
    removeProject: function(projectId) {
        $("#project-card-" + projectId).fadeOut("fast");
    }
}


$(document).ready(function() {

    $("#project-list .delete-project-btn").off().on("click", function() {
        let clickedProjectId = $(this).data("project");
        Projects.deleteProject(clickedProjectId);
    });




});
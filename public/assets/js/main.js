  const ownerModal = new bootstrap.Modal(document.getElementById('addNewOwnerModal'));

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

          ownerModal.hide()
      },
      setSelectNewOwner: function(newOwner) {

          $("#owner-select").append("<option value=\"" + newOwner.id + "\">" +
              newOwner.name + "</option>");

          $("#owner-select").val(newOwner.id);

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
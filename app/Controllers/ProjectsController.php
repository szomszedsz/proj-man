<?php 

namespace Welover\Controllers;
use Welover\Controllers\View;
use Welover\Models\OwnersModel;
use Welover\Models\ProjectOwnerPivotModel;
use Welover\Models\ProjectsModel;
use Welover\Models\ProjectStatusPivotModel;
use Welover\Models\StatusesModel;

class ProjectsController {
    
    private $DB;
    
    public function __construct(){
        $this->DB = new ProjectsModel;   
    }

    public function index()
    {
        $projectsData = $this->DB->getAllWithRelated();
     
        $View = new View('Views/Projects/list.tpl.php');
        $View->render(['projects' => $projectsData]);
        
    }


    public function create()
    {
        $formFieldData = $this->getFormFieldData();

        $View = new View('Views/Projects/edit.tpl.php');
        $View->render(
            [
            'statuses'=>$formFieldData['status_list'],
            'owners'=> $formFieldData['owner_list']
            ]
            
        );

       
        
    }

      public function edit(int $id = 0){

        $projectData = $this->DB->getOneWithRelated($id);

 
        
        $formFieldData = $this->getFormFieldData();

        $View = new View('Views/Projects/edit.tpl.php');
        $View->render(
            [
            'projects' => $projectData,
            'statuses'=>$formFieldData['status_list'],
            'owners'=> $formFieldData['owner_list']
            ]
        );
    }

    public function store(){
        //todo add validation
        //todo add error handling
        $errors = [];

        $Project = new ProjectsModel;
        $Project->setTitle($_POST['title']);
        $Project->setDescription($_POST['description']);

        try{
        $projectId = $this->DB->store($Project);
            try{
            $ProjectStatusPivot = new ProjectStatusPivotModel;
            $ProjectStatusPivot->setProjectId($projectId);
            $ProjectStatusPivot->setStatusId($_POST['status']);

            $ProjectStatusPivot->store($ProjectStatusPivot);
                try{        
                    $ProjectOwnerPivot = new ProjectOwnerPivotModel;
                    $ProjectOwnerPivot->setProjectId($projectId);
                    $ProjectOwnerPivot->setOwnerId($_POST['owner']);
                    $ProjectOwnerPivot->store($ProjectOwnerPivot);

                    header('Location: /');
                }
                catch(\Exception $e) {
                    $errors[] = $e->getMessage();
               
                    //todo  delete inserted project data
              }
            }
            catch(\Exception $e) {
                $errors[] = $e->getMessage();
                //todo  delete inserted project data
                  
              }
        }
        catch(\Exception $e) {
            $errors[] = $e->getMessage();
             
        }
    }

    public function update(){
        //todo make update method body
    }

    private function getFormFieldData():array{
        
        $formFieldData = [];
        $StatusModel = new StatusesModel;
        $formFieldData['status_list'] = $StatusModel->getAll();

        $OwnersModel = new OwnersModel;
        $formFieldData['owner_list'] = $OwnersModel->getAll();

        return $formFieldData;

    }

    
}
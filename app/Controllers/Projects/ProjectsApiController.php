<?php 

namespace Welover\Controllers\Projects;

use Welover\Models\ProjectsModel;
use Welover\Responses\ApiResponse;
use Welover\Controllers\BaseControllers\BaseApiController;
use Welover\Models\ProjectOwnerPivotModel;
use Welover\Models\ProjectStatusPivotModel;

class ProjectsApiController extends BaseApiController  {
    

    
    public function __construct(){
      parent::__construct();  
      $this->DB = new ProjectsModel; 
    }

      public function delete(int $id)
    {   

              $ApiResponse = $this->getResponse();
       $OwnerPivot = new ProjectOwnerPivotModel;
       $StatusPivot = new ProjectStatusPivotModel;

      
      
        $errorFlag = 0;

        //todo add transaction
        $ownerResult = $OwnerPivot->delete($id);
        $statusResult = $StatusPivot->delete($id);
        $projectResult = $this->DB->delete($id);
            
        if('0000'!= $ownerResult[0] || '0000'!= $statusResult[0] || '0000'!= $projectResult[0]){
          
              $ApiResponse->setStatus(500);
              $ApiResponse->setStatusMessage('DELETE_ERROR');
            
        }
        else{ 
            $ApiResponse->setStatus(200);
            $ApiResponse->setStatusMessage('PROJECT_DELETED');
        }
         return $ApiResponse->response();
    }

}
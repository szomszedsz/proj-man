<?php 

namespace Welover\Controllers\Projects;

use Welover\Models\ProjectsModel;
use Welover\Responses\ApiResponse;
use Welover\Controllers\BaseControllers\BaseApiController;

class ProjectsApiController extends BaseApiController  {
    

    
    public function __construct(){
      parent::__construct();  
      $this->DB = new ProjectsModel; 
    }

      public function delete(int $id):string
    {   

        $this->DB->delete($id);

        $ApiResponse = $this->getResponse();
        $ApiResponse->setStatus(200);
        $ApiResponse->setStatusMessage('PROJECT_DELETED');
        
        return $ApiResponse->response();
    }

}
<?php 

declare(strict_types=1);

namespace Welover\Controllers\OwnersController;

use Welover\Controllers\View;
use Welover\Models\OwnersModel;
use Welover\Responses\ApiResponse;
class OwnersController {
    
    private $DB;
    
    public function __construct(){
        $this->DB = new OwnersModel();   
    }


    public function store(){

        $Owner = new OwnersModel();
        $Owner->setName( (string) $_POST['name']);
        $Owner->setEmail( (string) $_POST['email']);

        $this->DB->store($Owner);     
        
        $Response = new ApiResponse(201,'data',[]); 
        $Response->response();
    }
}
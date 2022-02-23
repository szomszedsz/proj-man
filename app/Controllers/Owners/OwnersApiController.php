<?php 

declare(strict_types=1);

namespace Welover\Controllers\Owners;

use Welover\Controllers\View;
use Welover\Models\OwnersModel;
use Welover\Responses\ApiResponse;
class OwnersApiController {
    
    private $DB;
    
    public function __construct(){
        $this->DB = new OwnersModel;   
    }


    public function store(){
         
        $Response = new ApiResponse(); 

        $Owner = new OwnersModel;
        $Owner->setName($_POST['name']);
        $Owner->setEmail($_POST['email']);
        
        try{

        $lastInsertId = $this->DB->store($Owner);
            $Response->setStatus(201);
            $Response->setStatusMessage('OWNER_CREATED');
            $Response->setResponseData(['id'=> $lastInsertId,"name" => $Owner->getName()]);
        }
        catch(\Exception $e){
            
            $Response->setStatus(500);
            $Response->setStatusMessage('DB_ERROR');
            
            //todo make Log class and log errors
        }    
       
        $Response->response();
    }
}
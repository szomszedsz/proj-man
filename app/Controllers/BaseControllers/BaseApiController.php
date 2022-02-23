<?php

declare(strict_types=1);

namespace WeLover\Controllers\BaseControllers;

use Welover\Responses\ApiResponse;

abstract class BaseApiController{
    
    protected $response;
    public function __construct(){
    
        $this->setResponse(new ApiResponse());
    }

    public function setResponse(ApiResponse $Response):void
    {
        $this->response = $Response;
    }    

    public function getResponse():object
    {
        return $this->response;
    }    
    

}
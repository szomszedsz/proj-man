<?php

namespace Welover\Responses;


class ApiResponse{

    protected array $responseData;
    protected array $responseError;
    protected int $status;
    protected string $statusMessage;

    public function __construct()
        {
            $this->setStatus(200);
            $this->setStatusMessage('');
            $this->setResponseData([]);
        }

    public function setResponseData(array $responseData):void
    {
        $this->responseData = $responseData;
    }
     
    public function setResponseError(array $responseData):void
    {
        $this->responseData = $responseData;
    }

    public function setStatus(int $status):void
    {
        $this->status = $status;
    }

    public function setStatusMessage(string $statusMessage):void
    {
        $this->statusMessage = $statusMessage;
    }

    public function getResponseData():array{
        return $this->responseData;
    }

    public function getStatusMessage():string{
        return $this->statusMessage;
    }

    public function getStatus():int{
        return $this->status;
    }
   
    public function getResponseError():array{
        return $this->responseError;
    }


    public function response(){
    
        header("HTTP/1.1 ".$this->getStatus());
	
	    $response['status']=$this->getStatus();
	    $response['status_message']=$this->getStatusMessage();
	    $response['data']=$this->getResponseData();

        $json_response = json_encode($response);
	    echo $json_response;

    }

}
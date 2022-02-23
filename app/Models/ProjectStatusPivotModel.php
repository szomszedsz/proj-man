<?php

declare(strict_types=1);

namespace Welover\Models;
use Welover\Models\BaseModel;
use PDODb;

class ProjectStatusPivotModel extends BaseModel
{

    public int $projectId;
    public int $statusId;

    function __construct()
    {
        $tableName = 'project_status_pivot';
        parent::__construct($tableName,new PDODb(MSQL_CONNECT_DATA));
    }

 
    public function setProjectId(int $projectId):void
    {
        $this->projectId = $projectId;
    }

    public function setStatusId(int $statusId):void
    {
        $this->statusId = $statusId;
    }

        public function getProjectId():int
    {
        return $this->projectId;
    }

    public function getStatusId():int
    {
        return $this->statusId;
    }

   
    public function getAll():array
    {
        return $this->DB->setReturnType(\PDO::FETCH_CLASS,"ProjectStatusPivotModel")->get($this->table);
    }

  
     public function store(ProjectStatusPivotModel $ProjectStatusPivot):bool
    {
      $pivotData = [
        "project_id" => $ProjectStatusPivot->getProjectId(),
        "status_id" => $ProjectStatusPivot->getStatusId(),
      ];
     
      $lastInsertId =  $this->DB->insert($this->table, $pivotData);
     

   
      if ($lastInsertId) {
        return $lastInsertId;
      }
      else {
        throw new \Exception($this->DB->getLastError());
      }

    }


    public function delete($projectId){

      $this->DB->where('project_id', $projectId);
      $this->DB->delete($this->table);
      $this->DB->delete($this->table);
      return $this->DB->getLastError();
     
    }


      public function update(ProjectStatusPivotModel $ProjectStatusPivot){


        $updateData=[
          "project_id"=> $ProjectStatusPivot->getProjectId(),
          "status_id" => $ProjectStatusPivot->getStatusId(),
         ];

        $this->DB->where('project_id', $ProjectStatusPivot->getProjectId());

        try{
          if ($this->DB->update($this->table, $updateData)){
            return $this->DB->getRowCount();
          } else {
             throw new \Exception($this->DB->getLastError());
          }
        }
        catch(\PDOException $e){
          $e->getMessage();
        }
      
     
    }


}
<?php

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

  
     public function store(ProjectStatusPivotModel $ProjectStatusPivot):int
    {
      $pivotData = [
        "project_id" => $ProjectStatusPivot->getProjectId(),
        "status_id" => $ProjectStatusPivot->getStatusId(),
      ];
     
      $lastInsertId = $this->DB->insert($this->table, $pivotData);
   
      if ($lastInsertId) {
        return $lastInsertId;
      }
      else {
        throw new \Exception($this->DB->getLastError());
      }

    }
    

}
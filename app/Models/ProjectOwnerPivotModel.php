<?php

namespace Welover\Models;
use Welover\Models\BaseModel;
use PDODb;


class ProjectOwnerPivotModel extends BaseModel
{

    public int $projectId;
    public int $ownerId;

    function __construct()
    {
        $tableName = 'project_owner_pivot';
        parent::__construct($tableName,new PDODb(MSQL_CONNECT_DATA));
    }

 
    public function setProjectId(int $projectId):void
    {
        $this->projectId = $projectId;
    }

    public function setOwnerId(int $ownerId):void
    {
        $this->ownerId = $ownerId;
    }

        public function getProjectId():int
    {
        return $this->projectId;
    }

    public function getOwnerId():int
    {
        return $this->ownerId;
    }

   
    public function getAll():array
    {   // todo DRY violation... add to base controller
        return $this->DB->setReturnType(\PDO::FETCH_CLASS,"ProjectOwnerPivotModel")->get($this->table);
    }

  
     public function store(ProjectOwnerPivotModel $ProjectOwnerPivot):int
    {
      $pivotData = [
        "project_id" => $ProjectOwnerPivot->getProjectId(),
        "owner_id" => $ProjectOwnerPivot->getOwnerId(),
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
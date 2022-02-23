<?php

declare(strict_types=1);

namespace Welover\Models;

use Exception;
use Welover\Models\BaseModel;
use PDODb;



class ProjectsModel extends BaseModel
{

    public int $id;
    public string $title;
    public string $description;

    function __construct()
    {
        $tableName = 'projects';
        parent::__construct($tableName,new PDODb(MSQL_CONNECT_DATA));
    }

    public function setId(int $id):void
    {
      $this->id = $id;
    }

    public function setTitle(string $title):void
    {
      $this->title = $title;
    }

    public function setDescription(string $description):void
    {
      $this->description = $description;
    }

        public function getId():int
    {
      return $this->id;
    }

    public function getTitle():string
    {
      return $this->title;
    }

    public function getDescription():string
    {
      return $this->description;
    }

    public function getAll():array
    {
        
        return $this->DB->setReturnType(\PDO::FETCH_CLASS,"ProjectsModel")->get($this->table);
    }

    public function getAllWithRelated()
    {
      $this->DB->join("project_owner_pivot pop", "projects.id=pop.project_id", "LEFT");
        $this->DB->join("owners o", "pop.owner_id=o.id", "LEFT");
        $this->DB->join("project_status_pivot psp", "projects.id=psp.project_id", "LEFT");
        $this->DB->join("statuses s", "psp.status_id=s.id", "LEFT");

        $cols = [
          "projects.id p_id",
          "projects.title p_title",
          "projects.description p_description",
          "o.id o_id",
          "o.name o_name",
          "o.email o_email",
          "s.key s_key",
          "s.name s_name",
        ];

        return $this->DB->setReturnType(\PDO::FETCH_CLASS,"ProjectsModel")->get($this->table." projects" ,null,$cols);
    }

    public function getOne($id = 0)
    {       
        $this->DB->where("id", $id);
        return $this->DB->setReturnType(\PDO::FETCH_OBJ)->getOne("projects");
    }

    public function getOneWithRelated($id = 0){

        $this->DB->where("projects.id", $id);
        $this->DB->groupBy("projects.id");
        $this->DB->join("project_owner_pivot pop", "projects.id=pop.project_id", "LEFT");
        $this->DB->join("owners o", "pop.owner_id=o.id", "LEFT");
        $this->DB->join("project_status_pivot psp", "projects.id=psp.project_id", "LEFT");
        $this->DB->join("statuses s", "psp.status_id=s.id", "LEFT");

        $cols = [
          "projects.id p_id",
          "projects.title p_title",
          "projects.description p_description",
          "o.id o_id",
          "o.name o_name",
          "o.email o_email",
          "s.id s_id",
          "s.key s_key",
          "s.name s_name",
        ];

        return $this->DB->setReturnType(\PDO::FETCH_CLASS,"ProjectsModel")->get($this->table." projects" ,null,$cols);
    }
    

    public function store(ProjectsModel $Project):int
    {
      $ProjectData = [
        "title" => $Project->getTitle(),
        "description" => $Project->getDescription(),
      ];
      
      try{
      $lastInsertId = $this->DB->insert($this->table, $ProjectData);
      }
      catch(\PDOException $e){
        throw new \Exception($e->getMessage());
      }      

      if ($lastInsertId) {
        return $lastInsertId;
      }
      else {
        throw new Exception($this->DB->getLastError());
      }

    }

    public function delete($projectId){

      $this->DB->where('id', $projectId);
      $this->DB->delete($this->table);
      return $this->DB->getLastError();
     
    }

      public function update(ProjectsModel $Project){


        $updateData=[
          "id"=> $Project->getId(),
          "title" => $Project->getTitle(),
          "description" => $Project->getDescription()
        ];

        $this->DB->where('id', $Project->getId());

        try{
          if($this->DB->update($this->table, $updateData)){
            return $this->DB->getRowCount();
          } 
          else{
             throw new \Exception($this->DB->getLastError());
          }
        }
        catch(\PDOException $e){
          $e->getMessage();
        }
       
     
    }

}

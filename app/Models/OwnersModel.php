<?php

declare(strict_types=1);

namespace Welover\Models;
use Welover\Models\BaseModel;
use PDODb;

class OwnersModel extends BaseModel
{

    protected int $id;
    protected string $name;
    protected string $email;

    function __construct()
    {
        $tableName = 'owners';
        parent::__construct($tableName,new PDODb(MSQL_CONNECT_DATA));
    }

    public function setId(int $id):void
    {
        $this->id = $id;
    }

    public function setName(string $name):void
    {
        $this->name = $name;
    }

    public function setEmail(string $email):void
    {
        $this->email = $email;
    }

        public function getId():int
    {
        return $this->id;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getEmail():string
    {
        return $this->email;
    }

    public function getAll():array
    {
        return $this->DB->setReturnType(\PDO::FETCH_CLASS,"OwnersModel")->get($this->table);
    }

    public function store(OwnersModel $OwnersModel):int
    {

       $ownerData = [
        "name" => $OwnersModel->getName(),
        "email" => $OwnersModel->getEmail(),
      ];
     
      try{
        $lastInsertId = $this->DB->insert($this->table, $ownerData);
        return $lastInsertId;
      }
      catch(\PDOException $e){
        throw new \Exception($e->getMessage());
      }      
       
    }

}
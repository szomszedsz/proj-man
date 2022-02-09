<?php

namespace Welover\Models;
use Welover\Models\BaseModel;
use PDODb;


class OwnersModel extends BaseModel
{

    public int $id;
    public string $name;
    public string $email;

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
        return $this->Name;
    }

    public function getEmail():string
    {
        return $this->email;
    }

    public function getAll():array
    {
        return $this->DB->setReturnType(\PDO::FETCH_CLASS,"OwnersModel")->get($this->table);
    }

}
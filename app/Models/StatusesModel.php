<?php

declare(strict_types=1);

namespace Welover\Models;
use Welover\Models\BaseModel;
use PDODb;


class StatusesModel extends BaseModel
{

    public int $id;
    public string $key;
    public string $name;

    function __construct()
    {
        $tableName = 'statuses';
        parent::__construct($tableName,new PDODb(MSQL_CONNECT_DATA));
    }

    public function setId(int $id):void
    {
        $this->id = $id;
    }

    public function setKey(string $key):void
    {
        $this->key = $key;
    }

    public function setName(string $name):void
    {
        $this->name = $name;
    }

        public function getId():int
    {
        return $this->id;
    }

    public function getKey():string
    {
        return $this->key;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getAll():array
    {
        return $this->DB->setReturnType(\PDO::FETCH_CLASS,"StatusesModel")->get($this->table);
    }

}
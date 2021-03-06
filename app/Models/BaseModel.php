<?php 

declare(strict_types=1);

namespace Welover\Models;

abstract class BaseModel{
    
    protected $DB = '';
    protected $table = '';

    public function __construct(string $tableName,object $dbObj){
    
        $this->setDB($dbObj);
        $this->setTable($tableName);
    }

    protected function setTable(string $tableName):void
    {
        $this->table = $tableName;
    }

    protected function setDB(object $dbObj):void
    {
        $this->DB = $dbObj;
    }    

    public function getAll()
    {

    }

    public function getOne($id = 0){

    }

    public function create()
    {

    }

    public function delete($id)
    {

    }
   

    public function startTransaction(){
      $this->DB->startTransaction();
    }


    public function commitTransaction(){
      $this->DB->commit();
    }

    public function rollbackTransaction(){
      $this->DB->rollback();
    }

      public function saveTransaction(){
      $this->DB->save();
    }

}
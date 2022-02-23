<?php 

declare(strict_types=1);

namespace Welover\Controllers;
use Welover\Models\StatusesModel;

class StatusesController {
    
    private $DB;
    
    public function __construct(){
        $this->DB = new StatusesModel;   
    }

}
<?php 

namespace Welover\Controllers;
use Welover\Controllers\View;
use Welover\Models\OwnersModel;

class OwnersController {
    
    private $DB;
    
    public function __construct(){
        $this->DB = new OwnersModel;   
    }

}
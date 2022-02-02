<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Projects extends Model
{
    use HasFactory;


    public static function getAllProjectWithInfo()
    {
        return DB::table('projects')
                ->select('*')
                ->leftJoin('project_owner_pivot','projects.id','=','project_owner_pivot.project_id')
                ->leftJoin('owners','owners.id','=','project_owner_pivot.owner_id')
                ->get();
    }

}

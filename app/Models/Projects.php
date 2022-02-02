<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Projects extends Model
{
    use HasFactory;


    public static function getAllProjectWithInfo()
    {
        return DB::table('projects')
                ->select('*')
                ->leftJoin('project_owner_pivot','projects.id','=','project_owner_pivot.project_id')
                ->leftJoin('project_status_pivot','projects.id','=','project_statuspivot.project_id')
                ->leftJoin('owners','owners.id','=','project_owner_pivot.owner_id')
                ->leftJoin('statuses','statuses.id','=','project_statuspivot.status_id')
                ->get();

          
    }

}

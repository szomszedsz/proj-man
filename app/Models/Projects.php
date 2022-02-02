<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Projects extends Model
{
    use HasFactory;


       public function owners()
    {
        return $this->belongsToMany('App\Models\Owners','project_owner_pivot','project_id','owner_id');
    }

       public function statuses()
    {
        return $this->belongsToMany('App\Models\Statuses','project_status_pivot','project_id','status_id');
    }

}

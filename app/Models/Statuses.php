<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statuses extends Model
{
    use HasFactory;

    public function projects()
    {
         return $this->belongsToMany('App\Models\Projects','project_status_pivot','status_id','project_id');
    }

}

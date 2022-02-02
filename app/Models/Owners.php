<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owners extends Model
{
    use HasFactory;

    public function projects()
    {
         return $this->belongsToMany('App\Models\Projects','project_owner_pivot','owner_id','project_id');
    }

}

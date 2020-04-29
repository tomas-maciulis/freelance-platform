<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationDegree extends Model
{
    public function education()
    {
        return $this->hasMany('App\Education');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationDegree extends Model
{
    use SoftDeletes;

    public function education()
    {
        return $this->hasMany('App\Education');
    }
}

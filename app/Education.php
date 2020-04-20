<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use softDeletes;

    public function degree()
    {
        return $this->belongsTo('App\EducationDegree');
    }

    public function cv()
    {
        return $this->belongsTo('App\Cv');
    }

    public function workCategory()
    {
        return $this->belongsTo('App\WorkCategory');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobExperience extends Model
{
    use softDeletes;

    protected $guarded = ['created_at', 'updated_at', 'deleted_at', 'id'];

    public function cv()
    {
        return $this->belongsTo('App\Cv');
    }

    public function workCategory()
    {
        return $this->belongsTo('App\WorkCategory');
    }
}

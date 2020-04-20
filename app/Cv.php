<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cv extends Model
{
    use softDeletes;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function education()
    {
        return $this->hasMany('App\Education');
    }

    public function JobExperiences()
    {
        return $this->hasMany('App\JobExperience');
    }
}

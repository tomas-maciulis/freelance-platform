<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkCategory extends Model
{
    public $timestamps = False;

    public function ads() {
        return $this->belongsToMany('App\Ad');
    }

    public function educations()
    {
        return $this->hasMany('App\Education');
    }

    public function jobExperiences()
    {
        return $this->hasMany('App\JobExperience');
    }
}

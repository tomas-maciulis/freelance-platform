<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cv extends Model
{
    use softDeletes;

    protected $fillable = ['name', 'introduction', 'qualification'];

    public function user()

    {
        return $this->belongsTo('App\User');
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

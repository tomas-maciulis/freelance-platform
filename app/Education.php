<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{
    use softDeletes;

    protected $table = 'educations';
    protected $fillable = ['cv_id', 'education_degree_id', 'education_provider', 'specialty'];

    public function degree()
    {
        return $this->belongsTo('App\EducationDegree');
    }

    public function cv()
    {
        return $this->belongsTo('App\Cv');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function getWorkerAttribute() {
        return Bid::where('id', $this->bid_id)->first()->user;
    }

    public function review() {
        return $this->hasOne('App\Review');
    }

    public function bids() {
        return $this->hasMany('App\Bid');
    }

    public function category() {
        return $this->hasOne('App\WorkCategory');
    }

    public function remembered() {
        return $this->belongsToMany('App\User', 'remembered_ads')->withTimestamps();
    }

    public function messages() {
        return $this->hasMany('App\PrivateMessage');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}

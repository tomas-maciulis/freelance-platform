<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['birth_date'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'gender_id',
        'birth_date',
        'phone_number',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        if (isset($this->first_name) || isset($this->last_name)) {
            return "$this->first_name $this->last_name";
        } else {
            return null;
        }
    }

    public function ads() {
        return $this->hasMany('App\Ad');
    }

    public function reviews() {
        return $this->hasMany('App\Review');
    }

    public function privateMessages() {
        return $this->hasMany('App\PrivateMessage');
    }

    public function rememberedAds() {
        return $this->belongsToMany('App\Ad', 'remembered_ads');
    }

    public function gender() {
        return $this->belongsTo('App\Gender');
    }

    public function userType() {
        return $this->belongsTo('App\UserType');
    }

    public function cvs()
    {
        return $this->hasMany('App\Cv');
    }

    public function bids()
    {
        return $this->hasMany('App\Bid');
    }

    public function work()
    {
        return $this->hasMany('App\Ad');
    }
}

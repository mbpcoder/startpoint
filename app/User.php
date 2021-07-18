<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $dateFormat = 'U';

    protected $dates = [];

    public function getDates()
    {
        return $this->dates;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function departments()
    {
        return $this->hasMany('App\DepartmentUser');
    }
}

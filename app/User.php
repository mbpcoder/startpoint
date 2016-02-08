<?php

namespace Blog;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function posts()
    {
        return $this->hasMany('Blog\Post');
    }
}

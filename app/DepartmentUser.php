<?php

namespace StartPoint;

use Illuminate\Database\Eloquent\Model;

class DepartmentUser extends Model
{
    protected $table = 'departments_users';

    protected $fillable = ['user_id', 'department_id', 'manual'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('StartPoint\User');
    }

    public function department()
    {
        return $this->belongsTo('StartPoint\Department');
    }
}

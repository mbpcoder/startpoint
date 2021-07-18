<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = ['body', 'title', 'published', 'alias', 'user_id'];

    public $timestamps = false;

}

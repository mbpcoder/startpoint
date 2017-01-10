<?php

namespace StartPoint;

use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    protected $table = 'ticket_categories';

    public $timestamps = false;

    protected $fillable = ['name', 'order', 'user_id','published'];
}

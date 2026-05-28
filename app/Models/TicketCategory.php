<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TicketCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'order',
        'disabled',
    ];

    protected $casts = [
        'disabled' => 'boolean',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

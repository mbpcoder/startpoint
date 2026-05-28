<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsletterMember extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'email',
        'code',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
}

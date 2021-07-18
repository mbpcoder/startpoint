<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'post_id',
        'reply_to_id',
        'author_id',
        'author_name',
        'body',
        'published_at'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

<?php namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $dateFormat = 'U';

    protected $fillable = [];

    public function post()
    {
        return $this->belongsTo('Blog\Post');
    }
}

<?php namespace Blog;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [];

    protected $dateFormat = 'U';

    public function user()
    {
        return $this->belongsTo('Blog\User');
    }

    public function comments()
    {
        return $this->hasMany('Blog\Comment');
    }

    public function categories()
    {
        return $this->belongsToMany('Blog\Category', 'cat_post');
    }
}

<?php namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    protected $dates = [];

    public function getDates()
    {
        return $this->dates;
    }

    public function posts()
    {
        return $this->belongsToMany('Blog\Post', 'cat_post');
    }
}

<?php namespace Blog;

use Blog\Lib\PasoonDate;
use Illuminate\Database\Eloquent\Model;


/**
 * @property mixed pasoon
 */
class Post extends Model
{

    protected $table = 'posts';

    protected $fillable = [];

    protected $dateFormat = 'U';

    protected $dates = [];


    public function getCreatedAtAttribute($date)
    {
        $pasoon = new PasoonDate();
        $pasoon->setTimestamp($date);
        $date = $pasoon->jalali()->get()->format("%Year%/%Month%/%Day%");
        return (string)$date;
    }


    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value);
    }


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

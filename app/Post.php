<?php namespace App;

use App\Lib\PasoonDate;
use Illuminate\Database\Eloquent\Model;


/**
 * @property mixed    pasoon
 * @property int|null published
 * @property int|null user_id
 * @property mixed    body
 * @property mixed    title
 */
class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['body', 'title', 'published', 'alias', 'user_id'];

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
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_post');
    }
}

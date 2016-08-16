<?php namespace StartPoint;

use StartPoint\Lib\PasoonDate;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $dateFormat = 'U';

    protected $fillable = [];

    public function getCreatedAtAttribute($date)
    {
        $pasoon = new PasoonDate();
        $pasoon->setTimestamp($date);
        $date = $pasoon->jalali()->get()->format("%Year%/%Month%/%Day%");
        return (string)$date;
    }

    public function post()
    {
        return $this->belongsTo('StartPoint\Post');
    }
}

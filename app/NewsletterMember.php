<?php namespace StartPoint;

use Illuminate\Database\Eloquent\Model;

class NewsletterMember extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'newsletter_members';

    protected $dateFormat = 'U';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email','code','active','name'];
}

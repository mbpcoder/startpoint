<?php namespace StartPoint;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'newsletters';

	// Add your validation rules here
	public static $rules = [
		 'title' => 'min:3',
		 'content' => 'min:10',
	];

	// Don't forget to fill this array
	protected $fillable = ['title', 'content', 'user_id', 'receivers'];

    public function send($data)
    {
        Mail::send('emails.newsletter', $data, function ($message) use ($data) {
            $message->to($data['member']->email)->subject($data['newsletter']->title);
        });
    }

}

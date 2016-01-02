<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $table = 'category_post';

    public $timestamps = false;

    protected $dates = [];

    public function getDates()
    {
        return $this->dates;
    }
}

<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Category_Post extends Model
{
    protected $table = 'category_post';

    protected $dates = [];

    public function getDates()
    {
        return $this->dates;
    }
}

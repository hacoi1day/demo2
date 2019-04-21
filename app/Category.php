<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'display_name'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}

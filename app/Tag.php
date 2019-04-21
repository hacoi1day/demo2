<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = ['title', 'content'];

    public function artiles()
    {
        return $this->belongsToMany(Article::class);
    }
}

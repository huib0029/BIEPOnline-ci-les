<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'isbn',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    protected function copy()
    {
        return $this->hasMany('App\Copy');
    }
}

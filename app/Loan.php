<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'startdate', 'expirydate', 'returndate',
    ];

    public function copy()
    {
        return $this->belongsTo('App\Copy');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }
}

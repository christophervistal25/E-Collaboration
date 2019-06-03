<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = ['id','name'];

    public function cards()
    {
        return $this->hasMany('App\Card');
    }
}

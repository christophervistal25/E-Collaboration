<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['id','board_id','name'];

    public static function getDefaultCards() :array
    {
        return ['Need to be done','Doing','Done'];
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}

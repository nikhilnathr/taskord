<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class AnswerPraise extends Model
{
    use QueryCacheable;

    protected $cacheFor = 3600;

    protected $fillable = ['user_id', 'answer_id'];

    public function answer()
    {
        return $this->belongsTo('App\Answer');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

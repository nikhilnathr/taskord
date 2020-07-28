<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class QuestionPraise extends Model
{
    use QueryCacheable;

    protected $cacheFor = 3600;
    
    protected $fillable = ['user_id', 'question_id'];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

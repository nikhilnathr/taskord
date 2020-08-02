<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Question extends Model implements Viewable
{
    use QueryCacheable, InteractsWithViews;

    protected $cacheFor = 3600;

    protected $fillable = [
        'user_id',
        'title',
        'body',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function answer()
    {
        return $this->hasMany('App\Answer');
    }

    public function question_praise()
    {
        return $this->hasMany('App\QuestionPraise');
    }
}

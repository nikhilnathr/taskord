<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class TaskCommentPraise extends Model
{
    use QueryCacheable;

    protected $cacheFor = 3600;
    
    protected $fillable = ['user_id', 'task_comment_id'];

    public function task_comment()
    {
        return $this->belongsTo('App\TaskComment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

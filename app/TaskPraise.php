<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class TaskPraise extends Model
{
    use QueryCacheable;

    protected $cacheFor = 3600;

    protected $fillable = ['user_id', 'task_id'];

    public function task()
    {
        return $this->belongsTo('App\Task');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

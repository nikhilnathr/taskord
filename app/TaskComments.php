<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class TaskComments extends Model
{
    use QueryCacheable;

    protected $cacheFor = 3600;

    protected $fillable = [
        'user_id',
        'task_id',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}

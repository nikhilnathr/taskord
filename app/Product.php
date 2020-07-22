<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelSubscribe\Traits\Subscribable;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Product extends Model
{
    use QueryCacheable, Subscribable;

    protected $cacheFor = 3600;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function task()
    {
        return $this->hasMany('App\Task');
    }
}

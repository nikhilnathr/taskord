<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;
use Carbon\Carbon;

class StatsController extends Controller
{
    public function streaks($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $tasks = Task::select([
                \DB::raw('DATE(created_at) AS date'),
                \DB::raw('COUNT(id) AS count'),
            ])
            ->where('user_id', $user->id)
            ->whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get()
            ->toArray();

        return $tasks;
    }
}

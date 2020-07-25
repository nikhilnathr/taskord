<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\Question;
use Auth;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $launched_today = Product::where('launched', true)
            ->whereDate('launched_at', Carbon::today())
            ->orderBy('launched_at', 'DESC')
            ->take(6)
            ->get();
        $recently_questions = Question::orderBy('created_at', 'DESC')
            ->take(4)
            ->get();
        $recently_joined = User::where([
            ['created_at', '>=', Carbon::now()->subdays(7)],
            ['isFlagged', false],
        ])
            ->orderBy('created_at', 'DESC')
            ->take(5)
            ->get();
        $products = Product::where('launched', true)
            ->orderBy('created_at', 'DESC')
            ->take(5)
            ->get();
        $reputations = User::where('isFlagged', false)
            ->orderBy('reputation', 'DESC')
            ->take(10)
            ->get();

        // $from = date('Y-m-d', strtotime('-10 days'));
        // $to = date('Y-m-d');

        // $stats = Auth::user()->tasks()
        //     ->where('done', true)
        //     ->where('created_at', '>=', \Carbon\Carbon::now()->subMonth())
        //     ->groupBy('date')
        //     ->orderBy('date', 'DESC')
        //     ->get(array(
        //         DB::raw('Date(created_at) as date'),
        //         DB::raw('COUNT(*) as "tasks"')
        //     ));

        // dd($stats);

        return view('home/home', [
            'recently_questions' => $recently_questions,
            'launched_today' => $launched_today,
            'recently_joined' => $recently_joined,
            'products' => $products,
            'reputations' => $reputations,
        ]);
    }
}

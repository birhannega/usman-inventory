<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Sale;
use App\Models\Expense;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items_count = Item::where('deleted',0)->count();
        $sales = Sale::count();
        $today_expenses= Expense::where('deleted',0)->whereDate('created_at', '=', Carbon::today()->toDateString())->sum('exp_amount');
        $items= Item::where('amount','<',3)->paginate();

        return view('home', compact('items','items_count','sales','today_expenses'));
    }
}

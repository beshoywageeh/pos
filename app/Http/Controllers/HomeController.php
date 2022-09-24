<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\salesinv;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $data = [''];
            $data['category'] = DB::table('categories')->count();
            $data['clients'] = DB::table('clients')->count();
            $data['total_sales'] = number_format(DB::table('salesinvs')->sum('total'));
            $data['yesterday'] = DB::table('salesinvs')->where('inv_date', \Carbon\Carbon::yesterday()->format('Y-m-d'))->sum('total');
            $data['sales'] = DB::table('salesinvs')->select(
                DB::raw('YEAR(inv_date) as year'),
                DB::raw('Month(inv_date) as month'),
                DB::raw('sum(total) as Total')
            )->groupBy('month')->get();
            $data['clientlast'] = client::latest()->take(10)->get();
            $data['saleslast'] = salesinv::latest()->take(5)->get();
            $data['name'] = \Auth::user()->first_name;
            return view('backend/dashboard', ['data' => $data]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }

    }
}

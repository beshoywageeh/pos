<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\salesinv;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $data = [''];
            $data['clients'] = DB::table('clients')->count();
            $data['total_sales'] = DB::table('salesinvs')->sum('total');
            $data['yesterday'] = DB::table('salesinvs')->where('inv_date', \Carbon\Carbon::yesterday()->format('Y-m-d'))->sum('total');
            /* $data['sales'] = DB::table('salesinvs')->select(
                DB::raw('YEAR(inv_date) as year'),
                DB::raw('Month(inv_date) as month'),
                DB::raw('sum(total) as Total')
            )->groupBy('month')->get();
            */
            $data['clientlast'] = client::latest()->take(10)->get();
            $data['saleslast'] = salesinv::latest()->take(5)->get();
            $data['name'] = \Auth::user()->first_name;
            $data['expenses'] = DB::table('money_treasaries')->where('type', 2)->sum('debit');
            $data['income'] = DB::table('money_treasaries')->where('type', 1)->sum('credit');
            $data['chart'] = app()->chartjs
                ->name('barChartTest')
                ->type('bar')
                ->size(['width' => 400, 'height' => 200])
                ->labels([trans('general.tsales'), trans('general.income'), trans('general.expenses')])
                ->datasets(
                    [
                        [
                            "label" => trans('general.tsales'),
                            'backgroundColor' => ['rgba(255, 99, 132, 0.5)'],
                            "pointHoverBackgroundColor" => "#fff",
                            "pointHoverBorderColor" => "rgba(220,220,220,1)",
                            'data' => [$data['total_sales']],
                        ], [
                            "label" => trans('general.income'),
                            'backgroundColor' => ['rgba(54, 162, 235, 0.5)'],
                            "pointHoverBackgroundColor" => "#fff",
                            "pointHoverBorderColor" => "rgba(220,220,220,1)",
                            'data' => [$data['income']],
                        ], [
                            "label" => trans('general.expenses'),
                            'backgroundColor' => ["rgba(38, 185, 154, 0.5)"],
                            "pointHoverBackgroundColor" => "#fff",
                            "pointHoverBorderColor" => "rgba(220,220,220,1)",
                            'data' => [$data['expenses']],
                        ]
                    ]
                )
                ->options([]);
           //return $data;
            return view('backend/dashboard', ['data' => $data]);
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
}

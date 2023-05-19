<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\MoneyTreasary;
use App\Models\salesinv;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $data = [''];
            $data['clients'] = client::count();
            $data['total_sales'] = salesinv::sum('total');
            $data['clientlast'] = client::latest()->take(10)->get();
            $data['saleslast'] = salesinv::latest()->with('client')->take(10)->orderby('inv_date', 'desc')->get();
            $data['money_treasary'] = MoneyTreasary::latest()->with('client')->take(10)->orderby('payed_at', 'desc')->get();
            // return $data['money_treasary'];
            $data['name'] = \Auth::user()->first_name;
            $data['expenses'] = MoneyTreasary::sum('debit');
            $data['income'] = MoneyTreasary::sum('credit');
            $data['chart'] = app()->chartjs
                ->name('barChartTest')
                ->type('bar')
                ->size(['width' => 400, 'height' => 200])
                ->labels([trans('general.tsales'), trans('general.income'), trans('general.expenses')])
                ->datasets(
                    [
                        [
                            'label' => trans('general.tsales'),
                            'backgroundColor' => ['rgba(255, 99, 132, 0.5)'],
                            'pointHoverBackgroundColor' => '#fff',
                            'pointHoverBorderColor' => 'rgba(220,220,220,1)',
                            'data' => [$data['total_sales']],
                        ], [
                            'label' => trans('general.income'),
                            'backgroundColor' => ['rgba(54, 162, 235, 0.5)'],
                            'pointHoverBackgroundColor' => '#fff',
                            'pointHoverBorderColor' => 'rgba(220,220,220,1)',
                            'data' => [$data['income']],
                        ], [
                            'label' => trans('general.expenses'),
                            'backgroundColor' => ['rgba(38, 185, 154, 0.5)'],
                            'pointHoverBackgroundColor' => '#fff',
                            'pointHoverBorderColor' => 'rgba(220,220,220,1)',
                            'data' => [$data['expenses']],
                        ],
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

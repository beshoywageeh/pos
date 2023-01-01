<?php

namespace App\Http\Controllers;

use App\Models\MoneyTreasary;
use App\Models\client;
use Illuminate\Http\Request;

class MoenyTreasaryController extends Controller
{
    public function index()
    {
        $data = [];
        $data['Money_Treasary'] = MoneyTreasary::with('user', 'client')->orderBy('payed_at', 'desc')->get();
        $data['Client'] = Client::get();
        //return $data['Client'];
        return view('backend.Money_Treasary.index', ['data' => $data]);
    }
    public function store(Request $request)
    {
    }
}

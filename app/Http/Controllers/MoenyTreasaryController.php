<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\MoneyTreasary;
use Illuminate\Http\Request;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Support\Facades\Auth;

class MoenyTreasaryController extends Controller
{
    public function index()
    {
        // return '123';
        $data = [];
        $data['Money_Treasary'] = MoneyTreasary::with('user', 'client')->orderBy('payed_at', 'desc')->get();
        $data['Client'] = Client::get();
        //return $data['Client'];
        return view('backend.Money_Treasary.index', ['data' => $data]);
    }

    public function store(Request $request, ToastrFactory $flasher)
    {
          //    return $request;
        try {
            if (MoneyTreasary::latest()->first() == null) {
                $num = '1';
            } else {
                $number = MoneyTreasary::latest()->first()->num;
                $num = $number + 1;
            }
            $money = new MoneyTreasary();
            $money->client_id = $request->client;
            $money->user_id = Auth::user()->id;
            $money->type = $request->type;
            $money->payed_at = $request->date;
            $money->num = $num;
            if ($request->type == 1) {
                $money->credit = $request->amount;
                $money->debit = 0.00;
            } else {
                $money->debit = $request->amount;
                $money->credit = 0.00;
            }
            $money->save();

            $flasher->addSuccess(trans('general.add_msg'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
        //      return $request;
    }
}

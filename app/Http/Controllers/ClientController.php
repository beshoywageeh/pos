<?php

namespace App\Http\Controllers;

use App\Http\Traits\SettingTrait;
use App\Models\client;
use App\Models\MoneyTreasary;
use App\Models\country;
use App\Models\salesinv;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    use SettingTrait;

    public function index()
    {
        $countries = country::all();
        $clients = client::with('country')->get();

        return view('backend.client.index', compact('clients', 'countries'));
    }
    public function create()
    {
        //
    }

    public function store(Request $request, ToastrFactory $flasher)
    {
        //dd($request);
        try {
            $client = new client();
            $client->name = ['en' => $request->name_en, 'ar' => $request->name];
            $client->phone = $request->phone;
            $client->address = $request->address;
            $client->country_id = $request->country_id;
            $client->save();
            $flasher->AddSuccess(trans('general.add_msg'));

            return redirect('client');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($client)
    {
        $data = MoneyTreasary::where('client_id', $client)->with('client')->orderby('payed_at', 'asc')->get();
        //        $data['sales'] = salesinv::where('client_id', $client->id)->get();
        // return $data;
        //return $data['client'];
        return view('backend.client.show', compact('data'));
    }

    public function edit(client $client)
    {
        //
    }

    public function update(Request $request, ToastrFactory $flasher)
    {
        try {
            $client = Client::findorfail($request->id);
            // $client = new client();
            $client->name = ['en' => $request->name_en, 'ar' => $request->name];
            $client->phone = $request->phone;
            $client->address = $request->address;
            $client->country_id = $request->country_id;
            $client->save();
            $flasher->AddInfo(trans('general.edit_msg'));

            return redirect('client');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request, ToastrFactory $flasher)
    {
        try {
            client::destroy($request->id);
            $flasher->AddSuccess(trans('general.delete_msg'));

            return redirect('client');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function print($id)
    {
        try {
            $client = client::findorfail($id);
            $sales = salesinv::where('client_id', $id)->get();

            return view('backend.client.print_client_balance', compact('sales', 'client'), $this->GetData());
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function client_balance_invoice($id)
    {

        $debit = MoneyTreasary::where('client_id', $id)->sum('debit');
        $credit = MoneyTreasary::where('client_id', $id)->sum('credit');
        $total = number_format($debit - $credit);
        return $total;
    }
}
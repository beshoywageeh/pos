<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use App\Http\Traits\SettingTrait;
use App\Models\client;
use App\Models\country;
use App\Models\MoneyTreasary;
use App\Models\salesinv;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    use SettingTrait;

    public function index()
    {
        $countries = country::all();
        $clients = client::get();

        return view('backend.client.index', compact('clients', 'countries'));
    }

    public function create()
    {
        //
    }

    public function store(ClientStoreRequest $request, ToastrFactory $flasher)
    {
        //  dd($request);
        try {
            $client = new client();
            $client->name = ['en' => $request->name_en, 'ar' => $request->name];
            $client->phone = $request->phone;
            $client->address = $request->address;
            $client->country_id = $request->country_id;
            $client->code = $request->code;
            $client->balance = $request->balance;
            $client->save();
            $flasher->AddSuccess(trans('general.add_msg'));

            return redirect()->route('client_index');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    public function show($client)
    {
        $data = MoneyTreasary::where('client_id', $client)->with('client')->orderby('payed_at', 'asc')->get();

        return view('backend.client.show', compact('data'));
    }

    public function edit(client $client)
    {
        //
    }

    public function update(Request $request, ToastrFactory $flasher)
    {
        //  return $request;
        try {
            $client = Client::findorfail($request->id);
            $client->name = ['en' => $request->name_en, 'ar' => $request->name];
            $client->phone = $request->phone;
            $client->address = $request->address;
            $client->country_id = ($request->country_id) ? $request->country_id : $client->country_id;
            $client->save();
            $flasher->AddInfo(trans('general.edit_msg'));

            return redirect()->route('client_index');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request, ToastrFactory $flasher)
    {
        try {
            $sales_invs = salesinv::where('client_id', $request->id)->count();
            if ($sales_invs == 0) {
                client::destroy($request->id);
                $flasher->AddSuccess(trans('general.delete_msg'));
            } else {
                $flasher->AddError(trans('client.canotdelete'));
            }

            return redirect()->route('client_index');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function print($id)
    {
        try {
            $data = MoneyTreasary::where('client_id', $id)->with('client')->orderby('payed_at', 'asc')->get();
            // return $data[0]->client->totalBalance();
            return view('backend.client.print_client_balance', compact('data'), $this->GetData());
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

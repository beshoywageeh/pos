<?php

namespace App\Http\Controllers;

use App\Http\Traits\SettingTrait;
use App\Models\client;
use App\Models\country;
use App\Models\salesinv;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    use SettingTrait;
    public function index()
    {
        $countries = country::all();
        $clients = client::all();

        return view('backend.client.index', compact('clients', 'countries'));

    }public function create()
    {
        //
    }
    public function store(Request $request,ToastrFactory $flasher)
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
    public function show(client $client)
    {

        $data['client'] = client::with('money_transaction', 'salesinvs')->orderBY('created_at', 'desc')->get();
        $sales = salesinv::where('client_id',$client->id)->get();
        return $data;
        return view('backend.client.show',compact('sales','client'));
    }
    public function edit(client $client)
    {
        //
    }
    public function update(Request $request,ToastrFactory $flasher)
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
    public function destroy(Request $request,ToastrFactory $flasher)
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
            $sales = salesinv::where('client_id',$id)->get();
            return view('backend.client.print_client_balance',compact('sales','client'), $this->GetData());
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
}

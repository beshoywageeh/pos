<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $countries = country::all();
        $clients = client::all();

        return view('backend.client.index', compact('clients', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //dd($request);
        try {
            $client = new client();
            $client->name = ['en' => $request->name_en, 'ar' => $request->name];
            $client->phone = $request->phone;
            $client->address = $request->address;
            $client->country_id = $request->country_id;
            $client->save();
            // session()->flash('Add', trans('client.Add'));
            toastr()->success('تم إضافة البيانات بنجاح');

            return redirect('client');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {//dd($request);
        try {
            $client = Client::findorfail($request->id);
            // $client = new client();
            $client->name = ['en' => $request->name_en, 'ar' => $request->name];
            $client->phone = $request->phone;
            $client->address = $request->address;
            $client->country_id = $request->country_id;
            $client->save();
            toastr()->success('تم تعديل البيانات بنجاح');

            return redirect('client');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            client::destroy($request->id);
            //session()->flash('Delete', trans('category.Delete'));
            toastr()->success('تم حذف البيانات بنجاح');

            return redirect('client');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function getclient($id)
    {
        $client = DB::table('clients')->where('id', $id)->first();

        return json_encode($client);
    }
}

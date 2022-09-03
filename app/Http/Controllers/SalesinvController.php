<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\product;
use App\Models\product_salesinv;
use App\Models\salesinv;
use Illuminate\Http\Request;

class SalesinvController extends Controller
{
    public function index()
    {
        $salesinv = salesinv::with('client')->get();

        return view('backend.Salesinv.index', compact('salesinv'));
    }

    public function create()
    {
        if (salesinv::latest()
            ->first() == null) {
            $id = 'pos-0000';
            $ex = explode('-', $id);
        } else {
            $id = salesinv::latest()->first()->id;
            $data = salesinv::find($id);

            $ex = explode('-', $data->inv_num);
        }
        $clients = client::all();
        $products = product::all();

        return view('backend.Salesinv.create', compact('ex', 'clients', 'products'));
    }

    public function store(Request $request)
    {
        $total_inv = explode(' ', $request->total_inv);

        $details = [];
        //return $request;
        for ($i = 0; $i < count($request->product_id); $i++) {
            $details[$i]['product_id'] = $request->product_id[$i];
            $details[$i]['quantity'] = $request->product_qty[$i];
        }
        try {
            $salesinvs = new salesinv();
            $salesinvs->inv_num = $request->inv_num;
            $salesinvs->inv_date = $request->date;
            $salesinvs->client_id = $request->client;
            $salesinvs->user_id = $request->user_id;
            $salesinvs->total = $total_inv[0];
            $salesinvs->save();
            $id = salesinv::latest()->first();
            $invdata = new product_salesinv();
            $invdata->salesinv_id = $id->id;
            $salesinvs->products()
                ->attach($details);
            toastr()->success('تم إضافة البيانات بنجاح');

            return redirect('sales');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(salesinv $salesinv)
    {
    }

    public function saleinv($id)
    {
        //return $inv->products;
        try {
            $inv = salesinv::with('products', 'products_salesinvs')->where('id', $id)->first();
            $setting = \App\Models\setting::get()->first();
            return view('backend.Salesinv.show', compact('inv','setting'));
//return $inv->client;  
} catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(salesinv $salesinv)
    {
        //
    }

    public function update(Request $request, salesinv $salesinv)
    {
        //
    }

    public function destroy(Request $request)
    {
        try {
           product_salesinv::where('salesinv_id',$request->id)->delete();
            salesinv::destroy($request->id);
            toastr()->success('تم حذف البيانات بنجاح');

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
}

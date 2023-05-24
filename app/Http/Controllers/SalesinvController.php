<?php

namespace App\Http\Controllers;

use App\Http\Requests\salesinvrequest;
use App\Http\Traits\SettingTrait;
use App\Models\client;
use App\Models\MoneyTreasary;
use App\Models\product;
use App\Models\product_salesinv;
use App\Models\salesinv;
use Flasher\Noty\Prime\NotyFactory;
use Flasher\Toastr\Prime\ToastrFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalesinvController extends Controller
{
    use SettingTrait;

    public function index()
    {

        $salesinv = salesinv::with('client')->get();

        return view('backend.Salesinv.index', compact('salesinv'));
    }
    public function intial_sales()
    {
        $data['salesinv'] = salesinv::latest()
            ->first();
        if (
            $data['salesinv'] == null

        ) {
            $data['id'] = 'LL-0000';
            $data['ex'] = explode('-', $data['id']);
        } else {
            $data['id'] = salesinv::latest()->first()->id;
            $data['sales_inv'] = salesinv::find($data['id']);

            $data['ex'] = explode('-', $data['sales_inv']->inv_num);
        }
        $data['clients'] = client::all('id', 'name');
        $data['company'] = $this->GetData();

        return view('backend.Salesinv.initsale', ['data' => $data]);
    }
    public function create(Request $request, ToastrFactory $flasher)
    {
    //    return $request;
        try {
            $serial = salesinv::latest()
                ->first();
            $salesinvs = new salesinv();
            $salesinvs->inv_num = $request->inv_num;
            $salesinvs->inv_date = $request->date;
            $salesinvs->client_id = $request->client;
            $salesinvs->user_id = Auth::user()->id;
            $salesinvs->serial = ($serial == null) ? '1' : $serial->serial + 1;
            $salesinvs->save();
            $data['sales_invoice'] = salesinv::where('id', $serial->id)->with('client')->first();
            $data['product'] = product::all(['barcode', 'name']);
            $flasher->AddSuccess(trans('general.add_msg'));
            //return $data;
            return view(
                'backend.Salesinv.create',
                ['data' => $data]
            );
        } catch (\Exception $e) {
            $flasher->addError($e->getMessage());

            return redirect()->back();
        }
    }

    public function store(Request $request, ToastrFactory $flasher)
    {
        // return $request;
        try {
            $sales_inv = salesinv::findorfail($request->id);
            $sales_inv->update([
                'discount' => $request->discount,
                'tax_rate' => $request->tax_rate,
                'tax_value' => $request->tax_value,
                'total' => $request->total_inv,
            ]);
            MoneyTreasary::create([
                'num' => $request->inv_num,
                'payed_at' => $request->date,
                'debit' => $request->total_inv,

            ]);
            $flasher->AddSuccess(trans('general.add_msg'));

            return redirect()->route('salesinvoice_index');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id, NotyFactory $flasher)
    {
        try {
            $inv = salesinv::with('products_salesinvs', 'client')->where('id', $id)->first();
            //return $inv;
            return view('backend.Salesinv.show', compact('inv'), $this->GetData());
        } catch (\Exception $e) {
            $flasher->addError($e->getMessage());

            return redirect()->back();
            //->withErrors(['error' => $e->getMessage()]);
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

    public function destroy(Request $request, ToastrFactory $flasher)
    {
        try {
            $id = $request->id;
            salesinv::findorfail($id)->delete();
            $flasher->AddError(trans('general.delete_msg'));

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

 

    public function addProduct(Request $request)
    {

        if ($request->ajax()) {
            $salesinvs = new product_salesinv();
            $salesinvs->salesinv_id = $request->inv_id;
            $salesinvs->product_barcode = $request->barcode;
            $salesinvs->quantity = $request->quantity;
            $salesinvs->save();

            return response()->json([
                'status' => true,
                'msg' => trans('general.add_msg'),

            ]);
        }
    }

    public function getinvoicedata(Request $request)
    {
        $ids = product_salesinv::where('salesinv_id', $request->inv_id)->with('products')->get();
        //    return $ids;
        return view('backend.salesinv.data', compact('ids'));
    }

    public function deleteproduct(Request $request, ToastrFactory $flasher)
    {
        $id = $request->id;
        if ($request->ajax()) {
            product_salesinv::where('product_barcode', $id)->delete();
        }

        return response()->json([
            'status' => true,
            'msg' => trans('general.delete_msg'),
            'id' => $id,
        ]);
    }

    public function approve_invoice(Request $request)
    {
        if ($request->ajax()) {
            $data['invoice_product_count'] = product_salesinv::where('salesinv_id', $request->inv_id)->sum('quantity');
            $data['sales_invoice'] = $request->inv_id;
            return $data;
                /*  return response()->json([
                'data' => $data
            ])*/;
            //            return view('backend.salesinv.Approve_inv_data', ['data' => $data]);
        }
    }
    public function approve_close_invoice(Request $request, ToastrFactory $flasher)
    {
        return $request;
        try {
            $sales_inv = salesinv::findorfail($request->id);
            $sales_inv->update([
                'discount' => $request->discount,
                'tax_rate' => $request->tax_rate,
                'tax_value' => $request->tax_value,
                'total' => $request->total_inv,
            ]);
            MoneyTreasary::create([
                'num' => $request->inv_num,
                'payed_at' => $request->date,
                'debit' => $request->total_inv,

            ]);
            $flasher->AddSuccess(trans('general.add_msg'));

            return redirect()->route('salesinvoice_index');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    
    
}

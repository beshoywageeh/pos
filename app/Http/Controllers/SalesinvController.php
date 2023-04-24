<?php

namespace App\Http\Controllers;

use App\Http\Requests\salesinvrequest;
use App\Http\Traits\SettingTrait;
use App\Models\client;
use App\Models\MoneyTreasary;
use App\Models\product;
use App\Models\product_salesinv;
use App\Models\salesinv;
use App\Models\transinv;
use Carbon\Carbon;
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

    public function create()
    {
        try {
            if (salesinv::latest()
                ->first() == null
            ) {
                $id = 'LL-0000';
                $ex = explode('-', $id);
            } else {
                $id = salesinv::latest()->first()->id;
                $data = salesinv::find($id);

                $ex = explode('-', $data->inv_num);
            }
            $clients = client::all();
            $products = product::all();
            return view('backend.Salesinv.create', compact('ex', 'clients', 'products'), $this->GetData());
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function store(salesinvrequest $request, ToastrFactory $flasher)
    {
        try {
            $total_inv = explode(' ', $request->total_inv);
            $details = [];
            /*            for ($i = 0; $i < count($request->product_id); $i++) {
                $details[$i]['product_id'] = $request->product_id[$i];
                $details[$i]['quantity'] = $request->product_qty[$i];
            }
*/
            $salesinvs = new salesinv();
            $salesinvs->inv_num = $request->inv_num;
            $salesinvs->inv_date = $request->date;
            $salesinvs->client_id = $request->client;
            $salesinvs->discount = $request->discount;
            $salesinvs->tax_rate = $request->tax_rate;
            $salesinvs->tax_value = $request->tax_value;
            $salesinvs->user_id = Auth::user()->id;
            $salesinvs->total = $total_inv[0];
            $salesinvs->save();
            $id = salesinv::latest()->first();
            $invdata = new product_salesinv();
            $invdata->salesinv_id = $id->id;
            $salesinvs->products()
                ->attach($details);
            DB::table('transinvs')->truncate();
            MoneyTreasary::create([
                'num' => $request->inv_num,
                'payed_at' => $request->date,
                'debit' => $total_inv[0]

            ]);
            $flasher->AddSuccess(trans('general.add_msg'));

            return redirect('sales');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $inv = salesinv::with('products_salesinvs', 'client')->where('id', $id)->first();
            //return $inv;
            return view('backend.Salesinv.show', compact('inv'), $this->GetData());
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

    public function getProduct(Request $request)
    {
        if ($request->ajax()) {
            product_salesinv::create([
                'salesinv_id' => 301,
                'product_id' => $request->barcode,
                'quanntiy' => 1,
            ]);

            return response()->json([
                'status' => true,
                'msg' => trans('general.add_msg'),

            ]);
        }
    }

    public function getinvoicedata()
    {
        $ids = transinv::all('barcode');
        $products = product::whereIn('barcode', $ids)->get();
        //var_dump($products);
        return view('backend.salesinv.data', compact('products'));
    }

    public function deleteproduct(Request $request, ToastrFactory $flasher)
    {
        $id = $request->id;
        if ($request->ajax()) {
            transinv::where('barcode', $id)->delete();
        }

        return response()->json([
            'status' => true,
            'msg' => trans('general.delete_msg'),
            'id' => $id,
        ]);
    }


}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\salesinv;
use App\Models\product_salesinv;
use App\Models\product;
use App\Models\client;
use Illuminate\Http\Request;

class SalesinvController extends Controller
{
    public function index()
    {
        $salesinv = salesinv::all();
        return view('backend.Salesinv.index', compact('salesinv'));
    }
    public function create()
    {
        if(salesinv::latest()->first()==null){
            $id = 'pos-0000';
    $ex = explode('-', $id);

        }else{
            $id = salesinv::latest()->first()->id;
    $data = salesinv::find($id);
  //  $add = 'pos-'.$data;
    $ex = explode('-', $data->inv_num);
    
        }
    $clients = client::all();
    $products = product::all();
//return $ex;
        return view('backend.Salesinv.create',compact('ex','clients','products'));
    }
    public function store(Request $request)
    {
        $total_inv = explode(' ',$request->total_inv); 
        
        $details =[];
        for($i = 0; $i < count($request->product_id); $i++){
            $details[$i]['id'] = $request->product_id[$i];
            $details[$i]['qty'] = $request->product_qty[$i];
            $details[$i]['price'] = $request->product_price[$i];
        }
        //return $req;
        try{
            $salesinvs = new salesinv();
            $salesinvs->inv_num=$request->inv_num;
            $salesinvs->inv_date=$request->date;
            $salesinvs->client_id=$request->client;
            $salesinvs->user_id=$request->user_id;
            $salesinvs->total=$total_inv[0];
            $salesinvs->save();
            $id = salesinv::latest()->first();
        //    return $id->id;
for($x=0;$x<count($details);$x++){
    $invdata=new product_salesinv();
    $invdata->salesinv_id=$id->id;
    $invdata->product_id=$details[$x]['id'];
    $invdata->quantity=$details[$x]['qty'];
    $invdata->save();
}
            toastr()->success('تم إضافة البيانات بنجاح');
            return redirect('sales');
        }catch(\Exception $e){
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\salesinv  $salesinv
     * @return \Illuminate\Http\Response
     */
    public function show(salesinv $salesinv)
    { 
    }

    public function saleinv( $id)
    { 
        
        try{
            $inv = salesinv::where('id',$id)->first();
            $data = $inv->products;
        return view('backend.Salesinv.show',compact('inv','data'));
        }catch(\Exception $e){
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\salesinv  $salesinv
     * @return \Illuminate\Http\Response
     */
    public function edit(salesinv $salesinv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\salesinv  $salesinv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, salesinv $salesinv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\salesinv  $salesinv
     * @return \Illuminate\Http\Response
     */
    public function destroy(salesinv $salesinv)
    {
        //
    }

}

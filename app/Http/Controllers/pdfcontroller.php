<?php

namespace App\Http\Controllers;

use App\Http\Traits\SettingTrait;
use App\Models\salesinv;

class pdfcontroller extends Controller
{
    use SettingTrait;

    public function sales_Invoice($id)
    {

        try {
            $data['salesinv'] = salesinv::with('products_salesinvs', 'client')->where('id', $id)->first();
            $data['company_data'] = $this->GetData();

            return view('backend.pdf.salesInvoice', ['data' => $data], $this->GetData());

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
}

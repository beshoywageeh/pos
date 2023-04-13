<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\salesinv;
use PDF;


class pdfcontroller extends Controller
{

    public function sales_Invoice($id)
    {

        try {
            $data = salesinv::with('products_salesinvs', 'client')->where('id', $id)->first();
            //return $data->products_salesinvs[1]->products;
            $pdf = PDF::loadView('backend.pdf.salesInvoice', ['data' => $data], [], [
                'format' => 'A4',
                'margin_left' => 4,
                'margin_right' => 4,
                'margin_top' => 4,
                'margin_bottom' => 4,
                'margin_header' => 0,
                'margin_footer' => 0,
                'orientation' => 'P',
            ]);
            return $pdf->stream('salesinv.pdf');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
}

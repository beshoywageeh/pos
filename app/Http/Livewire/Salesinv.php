<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;

class Salesinv extends Component
{
    public $getproduct;

    protected $queryString = ['getproduct'];

    public function render()
    {
        $products = product::where('barcode', 'LIKE', '%'.$this->getproduct.'%')->get();

        return view('livewire.salesinv', compact('products'));
    }
}

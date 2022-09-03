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
            return view('livewire.salesinv', [
                'products' => product::where('id', 'like', '%'.$this->getproduct.'%')->get(),
            ]);
    }

}

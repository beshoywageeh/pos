<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\product;


class Salesinv extends Component
{
    public $getproduct;
    protected $queryString  = ['getproduct'];
    public function render()
    {
        $this->emit('change');
        if($this->getproduct !=''){
            return view('livewire.salesinv',[
                'product' => product::where('id', 'like', '%'.$this->getproduct.'%')->first(),
            ]);
        }else{
            return view('livewire.salesinv',["product"=>'']);
                
            }
    }
}

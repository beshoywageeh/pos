<?php

namespace App\Http\Livewire;

use App\Models\client;
use Livewire\Component;

class Screarch extends Component
{
    public $getclient;

    protected $queryString = ['getclient'];

    public function render()
    {

        // return view('livewire.screarch');
        if (! empty($this->queryString)) {
            return view('livewire.screarch', [
                'client' => client::where('id', 'like', '%'.$this->getclient.'%')->first(),
            ]);
        } else {
            return view('livewire.screach');
        }
    }
}

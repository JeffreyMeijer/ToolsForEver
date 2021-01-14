<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ShowProducts extends Component
{
    public $products;
    
    public function mount()
    {
        $this->products = Product::all();
    }
    public function render()
    {
        return view('livewire.show-products');
    }
}

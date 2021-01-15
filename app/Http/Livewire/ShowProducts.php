<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ShowProducts extends Component
{
    public $products;
    public $counter = 0;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function increment()
    {
        $this->counter++;
    }

    public function mount()
    {
        $this->products = Product::all();
    }
    public function render()
    {
        return view('livewire.show-products');
    }
    
    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        $this->product_id = $id;
        $this->artikel = $product->artikel;
        $this->voorraad = $product->voorraad;
        $this->beschrijving = $product->beschrijving;
        $this->afbeelding = $product->afbeelding;
    }

    public function delete($id)
    {
        if($id){
            Product::where('id',$id)->delete();
            $this->emit('refreshComponent');
            session()->flash('message', 'Product Deleted Successfully.');
        }
    }
}

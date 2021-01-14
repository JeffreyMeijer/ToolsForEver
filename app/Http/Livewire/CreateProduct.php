<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class CreateProduct extends Component
{
    public $product_id, $artikel, $voorraad, $beschrijving, $afbeelding;
    public function render()
    {
        return view('livewire.create-product');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'artikel' => 'required',
            'voorraad' => 'required',
            'beschrijving' => 'string|max:120',
            'afbeelding' => 'mimes:jpeg,png|max:1014'
        ]);
        Product::create($validatedData);

        session()->flash('message', 'Users Created Successfully.');
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

    public function update()
    {
        $validatedData = $this->validate([
            'artikel' => 'required',
            'voorraad' => 'required',
            'beschrijving' => 'string|max:120',
            'afbeelding' => 'mimes:jpeg,png|max:1014'
        ]);

        if ($this->product_id) {
            $product = Product::find($this->product_id);
            $product->update([
                'artikel' => $this->artikel,
                'voorraad' => $this->voorraad,
                'beschrijving' => $this->beschrijving,
                'afbeelding' => $this->afbeelding
            ]);
            session()->flash('message', 'Users Updated Successfully.');

        }
    }
}

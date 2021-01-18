<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Locatie;

class ShowProducts extends Component
{
    public $products, $locaties, $artikel_id, $artikel, $voorraad, $locatie, $beschrijving, $afbeelding;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->products = Product::all();
        $this->locaties = Locatie::all();
    }
    public function render()
    {
        return view('livewire.show-products');
    }

    public function store()
    {
        $validatedData = $this->validate([
            'artikel' => 'required',
            'voorraad' => 'required',
            'locatie' => 'required',
            'beschrijving' => 'string|max:120'
            // 'afbeelding' => 'mimes:jpeg,png|max:1014'
        ]);
        $product = Product::create($validatedData);

        $product->addLocation(1);

        
        session()->flash('message', 'Users Created Successfully.');

        $this->emit('refreshComponent');
    }
    
    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        $this->artikel_id = $id;
        $this->artikel = $product->artikel;
        $this->voorraad = $product->voorraad;
        $this->locatie = $product->locatie;
        $this->beschrijving = $product->beschrijving;
        $this->afbeelding = $product->afbeelding;
    }

    public function update()
    {
        $validatedData = $this->validate([
            'artikel' => 'required',
            'voorraad' => 'required',
            'beschrijving' => 'string|max:120'
            // 'afbeelding' => 'mimes:jpeg,png|max:1014'
        ]);

        if ($this->artikel_id) {
            $product = Product::find($this->artikel_id);
            $product->update([
                'artikel' => $this->artikel,
                'voorraad' => $this->voorraad,
                'beschrijving' => $this->beschrijving,
            ]);
            // $this->updateMode = false;
            $this->emit('refreshComponent');
            session()->flash('message', 'Users Updated Successfully.');
            // $this->resetInputFields();

        }
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

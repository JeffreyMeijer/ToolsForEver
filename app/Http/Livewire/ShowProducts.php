<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\Locatie;

class ShowProducts extends Component
{
    use WithFileUploads;
    public $products, $locaties, $artikel_id, $artikel, $voorraad, $locatie, $beschrijving, $afbeelding;
    public $currentlocatie;

    protected $listeners = ['refreshComponent' => '$refresh'];

    private function refreshInput()
    {
        $this->artikel_id = '';
        $this->artikel = '';
        $this->voorraad = '';
        $this->locatie = '';
        $this->beschrijving = '';
        $this->afbeelding = '';
    }

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
            'beschrijving' => 'string|max:120',
        ]);

        $this->validate([
            'afbeelding' => 'image|max:2048',
        ]);
        $product = Product::create($validatedData);
        // $product->afbeelding->store('afbeeldingen');
        $imageName = $product->id . "_" . $this->artikel . '.' . $this->afbeelding->extension();
        $this->afbeelding->storeAs('product_photos', $imageName);

        $product->update([
            'afbeelding' => $imageName,
        ]);
        

        $product->addLocation($this->locatie);

        $this->refreshInput();

        
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

    public function cancel()
    {
        $this->refreshInput();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'artikel' => 'required',
            'voorraad' => 'required',
            'locatie' => 'required',
            'beschrijving' => 'string|max:120',
            'afbeelding' => 'image|max:4096'
        ]);

        if ($this->artikel_id) {
            $product = Product::find($this->artikel_id);
            $product->update([
                'artikel' => $this->artikel,
                'voorraad' => $this->voorraad,
                'locatie' => $this->locatie,
                'beschrijving' => $this->beschrijving,
                'afbeelding' => $this->afbeelding
            ]);
            session()->flash('message', 'Users Updated Successfully.');
            $this->refreshInput();
            $this->emit('refreshComponent');

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

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\Locatie;

class ShowProducts extends Component
{
    use WithFileUploads;
    public $locaties, $artikel_id, $artikel, $voorraad, $locatie, $beschrijving, $afbeelding, $newlocatienaam, $newlocatieadres, $newlocatiepostcode;
    public $search = '';
    public $perPage = 10;
    public $currentlocatie;

    /**
     * The events that can be emitted when needed in the component
     * @var array
    */
    protected $listeners = ['refreshComponent' => '$refresh'];

    /**
     * Refreshes all the inputs of the form when needed.
    */
    private function refreshInput()
    {
        $this->artikel_id = '';
        $this->artikel = '';
        $this->voorraad = '';
        $this->locatie = '';
        $this->beschrijving = '';
        $this->afbeelding = '';
    }

    /**
     * Mounts all the public variables needed in case it failed to do so automatically.
    */
    public function mount()
    {
        $this->locaties = Locatie::all();
    }

    /**
     * Renders the page / view
     * @return void
    */
    public function render()
    {
        return view('livewire.show-products', [
            'products' => Product::search($this->search)->simplePaginate($this->perPage),
        ]);
    }

    /**
     * Stores all the data that was entered into the form in the database for later use.
    */
    public function store()
    {
        $validatedData = $this->validate([
            'artikel' => 'required',
            'voorraad' => 'required',
            'beschrijving' => 'string|max:120',
        ]);

        $this->validate([
            'locatie' => 'required',
            'afbeelding' => 'image|max:4096',
        ]);

        $product = Product::create($validatedData);
        $imageName = $product->id . "_" . $this->artikel . '.' . $this->afbeelding->extension();
        $this->afbeelding->storeAs('product_photos', $imageName);

        if($this->locatie == 'new') {
            $this->validate([
                'newlocatienaam' => 'required',
                'newlocatieadres' => 'required',
                'newlocatiepostcode' => 'required'
            ]);

            $newlocation = Locatie::create([
                'naam' => $this->newlocatienaam,
                'adres' => $this->newlocatieadres,
                'postcode' => $this->newlocatiepostcode
            ]);

            $this->locatie = $newlocation->id;
        }
        
        $product->update([
            'afbeelding' => $imageName,
        ]);
        

        $product->addLocation($this->locatie);

        $this->refreshInput();

        
        session()->flash('message', 'Users Created Successfully.');

        $this->emit('refreshComponent');
    }
    
    /**
     * Sets the edit form up with the existing data
     * @param int $id The ID of the Product we're going to edit
    */
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

    /**
     * When the user cancels a creation or edit it resets all the inputs for the next edit or creation.
    */
    public function cancel()
    {
        $this->refreshInput();
    }

    /**
     * Updates the Product that was being edited.
    */
    public function update()
    {
        $validatedData = $this->validate([
            'artikel' => 'required',
            'voorraad' => 'required',
            'beschrijving' => 'string|max:120',
        ]);

        $this->validate([
            'locatie' => 'required',
            'afbeelding' => 'image|max:4096',
        ]);
        
        if ($this->artikel_id) {
            $product = Product::find($this->artikel_id);
            
            $imageName = $product->id . "_" . $this->artikel . '.' . $this->afbeelding->extension();
            $this->afbeelding->storeAs('product_photos', $imageName);
            
            if($this->locatie == 'new') {
                $this->validate([
                    'newlocatienaam' => 'required',
                    'newlocatieadres' => 'required',
                    'newlocatiepostcode' => 'required'
                ]);

                $newlocation = Locatie::create([
                    'naam' => $this->newlocatienaam,
                    'adres' => $this->newlocatieadres,
                    'postcode' => $this->newlocatiepostcode
                ]);

                $this->locatie = $newlocation->id;
            }

            $product->update([
                'artikel' => $this->artikel,
                'voorraad' => $this->voorraad,
                'beschrijving' => $this->beschrijving,
                'afbeelding' => $imageName
            ]);

            $product->setLocation($this->locatie);
            
            session()->flash('message', 'Users Updated Successfully.');
            $this->refreshInput();
            $this->emit('refreshComponent');

        }
    }

    /**
     * Deletes the Product based on their ID
     * @param int $id Employee ID
    */
    public function delete($id)
    {
        if($id){
            Product::where('id',$id)->delete();
            $this->emit('refreshComponent');
            session()->flash('message', 'Product Deleted Successfully.');
        }
    }
}

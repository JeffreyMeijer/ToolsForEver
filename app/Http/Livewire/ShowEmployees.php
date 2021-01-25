<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Locatie;
use Livewire\WithFileUploads;

class ShowEmployees extends Component
{
    use WithFileUploads;
    public $employees, $locaties, $medewerker_id, $naam, $positie, $locatie, $beschrijving, $afbeelding;
    public $currentlocatie;

    protected $listeners = ['refreshComponent' => '$refresh'];

    private function refreshInput()
    {
        $this->medewerker_id = '';
        $this->naan = '';
        $this->positie = '';
        $this->locatie = '';
        $this->beschrijving = '';
        $this->afbeelding = '';
    }

    public function mount()
    {
        $this->employees = Employee::all();
        $this->locaties = Locatie::all();
    }
    public function render()
    {
        return view('livewire.show-employees');
    }

     public function store()
    {
        $validatedData = $this->validate([
            'naam' => 'required',
            'positie' => 'required',
            'locatie' => 'required',
            'beschrijving' => 'string|max:120',
        ]);

        $this->validate([
            'afbeelding' => 'image|max:4096',
        ]);
        $employee = Employee::create($validatedData);
        // $product->afbeelding->store('afbeeldingen');
        $imageName = $employee->id . "_" . $this->naam . '.' . $this->afbeelding->extension();
        $this->afbeelding->storeAs('employee_photos', $imageName);

        $employee->update([
            'afbeelding' => $imageName,
        ]);
        

        $employee->addLocation($this->locatie);

        $this->refreshInput();

        
        session()->flash('message', 'Medewerker Created Successfully.');

        $this->emit('refreshComponent');
    }
    
    public function edit($id)
    {
        $employee = Employee::where('id',$id)->first();
        $this->medewerker_id = $id;
        $this->naam = $employee->naam;
        $this->positie = $employee->positie;
        $this->locatie = $employee->locatie;
        $this->beschrijving = $employee->beschrijving;
        $this->afbeelding = $employee->afbeelding;
    }

    public function cancel()
    {
        $this->refreshInput();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'naam' => 'required',
            'positie' => 'required',
            'locatie' => 'required',
            'beschrijving' => 'string|max:120',
            'afbeelding' => 'image|max:4096'
        ]);

        
        
        if ($this->medewerker_id) {
            $employee = Employee::find($this->medewerker_id);
            
            $imageName = $employee->id . "_" . $this->naam . '.' . $this->afbeelding->extension();
            $this->afbeelding->storeAs('employee_photos', $imageName);
            
            $product->update([
                'naam' => $this->naam,
                'positie' => $this->positie,
                'locatie' => $this->locatie,
                'beschrijving' => $this->beschrijving,
                'afbeelding' => $imageName
            ]);
            session()->flash('message', 'Medewerker Updated Successfully.');
            $this->refreshInput();
            $this->emit('refreshComponent');

        }
    }

    public function delete($id)
    {
        if($id){
            Employee::where('id',$id)->delete();
            $this->emit('refreshComponent');
            session()->flash('message', 'Medewerker Deleted Successfully.');
        }
    }
}

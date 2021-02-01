<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Locatie;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowEmployees extends Component
{
    use WithFileUploads;
    public $locaties, $medewerker_id, $naam, $positie, $locatie, $beschrijving, $afbeelding, $newlocatienaam, $newlocatieadres, $newlocatiepostcode;
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
        $this->medewerker_id = '';
        $this->naan = '';
        $this->positie = '';
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
        return view('livewire.show-employees', [
            'employees' => Employee::search($this->search)->simplePaginate($this->perPage),
        ]);
    }

    /**
     * Stores all the data that was entered into the form in the database for later use.
    */

    public function store()
    {
        $validatedData = $this->validate([
            'naam' => 'required',
            'positie' => 'required',
            'beschrijving' => 'string|max:120',
        ]);

        $this->validate([
            'locatie' => 'required',
            'afbeelding' => 'image|max:4096',
        ]);
        $employee = Employee::create($validatedData);
        $imageName = $employee->id . "_" . $this->naam . '.' . $this->afbeelding->extension();
        $this->afbeelding->storeAs('employee_photos', $imageName);

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

        $employee->update([
            'afbeelding' => $imageName,
        ]);
        

        $employee->addLocation($this->locatie);

        $this->refreshInput();

        
        session()->flash('message', 'Medewerker Created Successfully.');

        $this->emit('refreshComponent');
    }
    
    /**
     * Sets the edit form up with the existing data
     * @param int $id The ID of the Employee we're going to edit
    */
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

    /**
     * When the user cancels a creation or edit it resets all the inputs for the next edit or creation.
    */
    public function cancel()
    {
        $this->refreshInput();
    }

    /**
     * Updates the Employee that was being edited.
    */
    public function update()
    {
        $validatedData = $this->validate([
            'naam' => 'required',
            'positie' => 'required',
            'beschrijving' => 'string|max:120',
        ]);

        $this->validate([
            'locatie' => 'required',
            'afbeelding' => 'image|max:4096',
        ]);

        
        
        if ($this->medewerker_id) {
            $employee = Employee::find($this->medewerker_id);
            
            $imageName = $employee->id . "_" . $this->naam . '.' . $this->afbeelding->extension();
            $this->afbeelding->storeAs('employee_photos', $imageName);
            
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

            $employee->update([
                'naam' => $this->naam,
                'positie' => $this->positie,
                'beschrijving' => $this->beschrijving,
                'afbeelding' => $imageName
            ]);

            $employee->setLocation($this->locatie);

            session()->flash('message', 'Medewerker Updated Successfully.');
            $this->refreshInput();
            $this->emit('refreshComponent');

        }
    }

    /**
     * Deletes the employee based on their ID
     * @param int $id Employee ID
    */
    public function delete($id)
    {
        if($id){
            Employee::where('id',$id)->delete();
            $this->emit('refreshComponent');
            session()->flash('message', 'Medewerker Deleted Successfully.');
        }
    }
}

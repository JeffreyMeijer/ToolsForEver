<div>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createEmployee">
  Medewerker aanmaken
  </button>

  <div wire:ignore.self class="modal fade" id="createEmployee" tabindex="-1" role="dialog" aria-labelledby="createEmployeeLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createEmployeeLabel">Medewerker aanmaken</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
                <label for="naamInput">Naam</label>
                <input type="text" class="form-control" id="naamInput" placeholder="Naam" wire:model="naam">
                @error('naam') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="positieInput">Positie</label>
                <input type="text" class="form-control" id="positieInput" wire:model="positie" placeholder="Positie">
                @error('positie') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
              <label for="locatieInput">Locatie</label>
              <select class="form-select" id="createLocation" wire:model="locatie">
                <option value="" selected>Selecteer een locatie</option>
                <option value="1">Assen</option>
                <option value="2">Emmen</option>
                <option value="new">Nieuwe locatie</option>
              </select>
              @include('livewire.create-location')
              @error('locatie') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="beschrijvingInput">Korte beschrijving</label>
                <textarea name="beschrijving" class="form-control" id="beschrijvingInput" wire:model="beschrijving" placeholder="Korte beschrijving" rows="4" cols="5"></textarea>
                {{-- <input type="email" class="form-control" id="beschrijvingInput" wire:model="beschrijving" placeholder="Korte beschrijving"> --}}
                @error('beschrijving') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
              <label for="fotoInput">Afbeelding</label>
              <input type="file" class="form-control" id="fotoInput" wire:model="afbeelding">
              @error('afbeelding') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Sluiten</button>
          <button wire:click.prevent="store()" class="btn btn-primary">Medewerker aanmaken</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div>
  <div wire:ignore.self class="modal fade" id="updateEmployee" tabindex="-1" role="dialog" aria-labelledby="updateEmployeeLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateEmployeeLabel">Medewerker veranderen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
                <input type="hidden" wire:model="medewerker_id">
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
              <select class="form-select" id="locatieInput" wire:model="locatie">
                <option value="" selected>Selecteer een locatie</option>
                <option value="1" selected>Assen</option>
                <option value="2">Emmen</option>
              </select>
              @error('locatie') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="beschrijvingInput">Korte beschrijving</label>
                <textarea name="beschrijving" class="form-control" id="beschrijvingInput" wire:model="beschrijving" placeholder="Korte beschrijving" rows="4" cols="5"></textarea>
                {{-- <input type="text" class="form-control" id="beschrijvingInput" wire:model="beschrijving" placeholder="Korte beschrijving"> --}}
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
          <button wire:click.prevent="update()" class="btn btn-primary">Medewerker updaten</button>
        </div>
      </div>
    </div>
  </div>
</div>
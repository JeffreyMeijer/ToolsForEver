<div>
  <button type="button" class="btn btn-primary py-3 px-4 pr-8" data-bs-toggle="modal" data-bs-target="#createProduct">
  Product aanmaken
  </button>

  <div wire:ignore.self class="modal fade" id="createProduct" tabindex="-1" role="dialog" aria-labelledby="createProductLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createProductLabel">Product aanmaken</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
                <label for="artikelInput">Artikel</label>
                <input type="text" class="form-control" id="artikelInput" placeholder="Artikel" wire:model="artikel">
                @error('artikel') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="voorraadInput">Voorraad</label>
                <input type="email" class="form-control" id="voorraadInput" wire:model="voorraad" placeholder="Voorraad">
                @error('voorraad') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
              <label for="locatieInput">Locatie</label>
              <select class="form-select" id="createLocation" wire:model="locatie">
                <option value="" selected>Selecteer een locatie</option>
                @foreach ($locaties as $location)
                  <option value="{{ $location->id }}">{{ $location->naam }}</option>
                @endforeach
                <option value="new">Nieuwe locatie aanmaken</option>
              </select>
              @error('locatie') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            @if($locatie == 'new')
              @include('livewire.create-location')
            @endif
            <div class="form-group">
                <label for="beschrijvingInput">Korte beschrijving</label>
                <textarea name="beschrijving" class="form-control" id="beschrijvingInput" wire:model="beschrijving" placeholder="Korte beschrijving" rows="4" cols="5"></textarea>
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
          <button wire:click.prevent="store()" class="btn btn-primary">Product aanmaken</button>
        </div>
      </div>
    </div>
  </div>
</div>
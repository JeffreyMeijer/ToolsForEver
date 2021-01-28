<div>
  <div wire:ignore.self class="modal fade" id="updateProduct" tabindex="-1" role="dialog" aria-labelledby="updateProductLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateProductLabel">Product veranderen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
                <input type="hidden" wire:model="product_id">
                <label for="artikelInput">Artikel</label>
                <input type="text" class="form-control" id="artikelInput" placeholder="Artikel" wire:model="artikel">
                @error('artikel') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="voorraadInput">Voorraad</label>
                <input type="number" class="form-control" id="voorraadInput" wire:model="voorraad" placeholder="Voorraad">
                @error('voorraad') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
              <label for="locatieInput">Locatie</label>
              <select class="form-select" id="locatieInput" wire:model="locatie">
                <option value="" selected>Selecteer een locatie</option>
                @foreach ($locaties as $location)
                  <option value="{{ $location->id }}">{{ $location->naam }}</option>
                @endforeach
                {{-- <option value="2">Emmen</option> --}}
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
          <button wire:click.prevent="update()" class="btn btn-primary">Product updaten</button>
        </div>
      </div>
    </div>
  </div>
</div>
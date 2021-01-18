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
                <input type="email" class="form-control" id="voorraadInput" wire:model="voorraad" placeholder="Voorraad">
                @error('voorraad') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
              <label for="locatieInput">Locatie</label>
              <select class="form-select" id="createLocation" wire:model="locatie">
                <option value="1" selected>Assen</option>
                <option value="2">Emmen</option>
              </select>
              @error('locatie') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label for="beschrijvingInput">Korte beschrijving</label>
                <input type="email" class="form-control" id="beschrijvingInput" wire:model="beschrijving" placeholder="Korte beschrijving">
                @error('beschrijving') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Sluiten</button>
          <button wire:click.prevent="update()" class="btn btn-primary">Product updaten</button>
        </div>
      </div>
    </div>
  </div>
</div>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProduct">
Launch demo modal
</button>

<div wire:ignore.self class="modal fade" id="createProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
              <label for="beschrijvingInput">Korte beschrijving</label>
              <input type="email" class="form-control" id="beschrijvingInput" wire:model="beschrijving" placeholder="Korte beschrijving">
              @error('beschrijving') <span class="text-danger error">{{ $message }}</span>@enderror
          </div>
          <div class="form-group">
              <label for="exampleFormControlInput2">Voorraad</label>
              <input type="image" class="form-control" id="fotoInput" wire:model="afbeelding" placeholder="Enter Voorraad">
              @error('foto') <span class="text-danger error">{{ $message }}</span>@enderror
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sluiten</button>
        <button type="button" wire:click.prevent="store()" class="btn btn-primary">Product aanmaken</button>
      </div>
    </div>
  </div>
</div>
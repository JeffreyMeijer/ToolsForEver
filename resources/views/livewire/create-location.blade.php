<div>
  <form>
    <div class="form-group toHide">
      <label for="locatieNaamInput">Locatienaam</label>
      <input type="text" class="form-control" id="locatieNaamInput" wire:model="locatie" placeholder="Locatie">
    </div>
    <div class="form-group toHide">
      <label for="locatieAdresInput">Adres</label>
      <input type="text" class="form-control" id="locatieAdresInput" wire:model="adres" placeholder="Adres">
    </div>
    <div class="form-group toHide">
      <label for="locatiePostcodeInput">Postcode</label>
      <input type="text" class="form-control" id="locatiePostcodeInput" wire:model="postcode" placeholder="Postcode">
    </div>
    {{-- <div class="form-group">
        <label for="newlocatieInput">Locatie</label>
        <input type="text" class="form-control" id="newlocatieInput" placeholder="Locatie" wire:model="locatie">
        @error('locatie') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="adresInput">Adres</label>
        <input type="text" class="form-control" id="adresInput" wire:model="adres" placeholder="Adres">
        @error('adres') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
      <label for="postcodeInput">Postcode</label>
      <input type="text" class="form-control" id="postcodeInput" wire:model="postcode" placeholder= "Postcode">
      @error('postcode') <span class="text-danger error">{{ $message }}</span>@enderror
    </div> --}}
  </form>
</div>
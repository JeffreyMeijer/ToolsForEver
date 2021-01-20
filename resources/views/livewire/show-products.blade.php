{{-- <div class="grid-container"> --}}
<div>
    @include('livewire.edit-product')
    <table class="table" >
        <tr>
            <th>Afbeelding</th>
            <th>Artikel</th>
            <th>Voorraad</th>
            <th>Locatie</th>
            <th>Beschrijving</th>
            <th></th>
        </tr>
        @foreach ($products as $product)
            @foreach ($product->locations as $location)
                @if($currentlocatie != 0)
                        @if($location->id == $currentlocatie)
                            <tr>
                                <td><img src="{{asset('storage/product_photos/' . $product->afbeelding)}}" width="100" height="100"/></td>
                                <td>{{ $product->artikel }}</td>
                                <td>{{ $product->voorraad }}</td>
                                <td>{{ $location->naam }}</td>
                                <td>{{ $product->beschrijving }}</td>
                                <td>
                                <button data-bs-toggle="modal" data-bs-target="#updateProduct" wire:click="edit({{ $product->id }})" class="btn btn-primary btn-sm">Edit</button>
                                <button wire:click="delete({{ $product->id }})">Delete</button>
                                </td>
                            </tr>
                        @endif
                @else
                    <tr>
                        <td><img src="{{asset('storage/product_photos/' . $product->afbeelding)}}" width="100" height="100"/></td>
                        <td>{{ $product->artikel }}</td>
                        <td>{{ $product->voorraad }}</td>
                        <td>{{ $location->naam }}</td>
                        <td>{{ $product->beschrijving }}</td>
                        <td>
                        <button data-bs-toggle="modal" data-bs-target="#updateProduct" wire:click="edit({{ $product->id }})" class="btn btn-primary btn-sm">Edit</button>
                        <button wire:click="delete({{ $product->id }})">Delete</button>
                        </td>
                    </tr>
                @endif
            @endforeach
        {{-- <div class="grid-row">
        <div class="grid-item">
            <h1>{{$product->afbeelding}}</h1>
        </div>
        <div class="grid-item">
            <h1>{{$product->artikel}}</h1>
            <h1>{{$product->beschrijving}}</h1>
        </div>
        <div class="grid-item">
            <h1>{{$product->voorraad}}</h1>
        </div>
    </div> --}}
        @endforeach
    </table>
    <div style="display:flex;justify-content:space-between;">
    @include("livewire.create-product")
        <select class="form-select" style="width:20%;" id="selectLocation" wire:model="currentlocatie">
            <option value="0" selected>Alles</option>
            <option value="1">Assen</option>
            <option value="2">Emmen</option>
        </select>
    </div>
</div>

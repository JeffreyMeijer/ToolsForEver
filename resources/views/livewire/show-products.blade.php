{{-- <div class="grid-container"> --}}
<div>
    <div class="input-group grid justify-between py-4">
        <div class="w-2/6 relative pr-3">
            <input wire:model="search" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Zoeken...">
        </div>
        <div class="w-2/6 relative pr-3">
            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="selectLocation" wire:model="currentlocatie">
                <option value="0" selected>Alles</option>
                @foreach ($locaties as $location)
                  <option value="{{ $location->id }}">{{ $location->naam }}</option>
                @endforeach
                {{-- <option value="1">Assen</option> --}}
                {{-- <option value="2">Emmen</option> --}}
            </select>
        </div>
        <div class="w-1/6 relative pr-3">
            <select wire:model="perPage" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
        <div class="w-1/6 relative">
            @include("livewire.create-product")
        </div>
    </div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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
                                    <button data-bs-toggle="modal" data-bs-target="#updateProduct" wire:click="edit({{ $product->id }})" class="btn btn-primary btn-sm">Bewerk</button>
                                    <button wire:click="delete({{ $product->id }})" class="btn btn-danger btn-sm">Verwijder</button>
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
                            <button data-bs-toggle="modal" data-bs-target="#updateProduct" wire:click="edit({{ $product->id }})" class="btn btn-primary btn-sm">Bewerk</button>
                            <button wire:click="delete({{ $product->id }})" class="btn btn-danger btn-sm">Verwijder</button>
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
        {{-- <div style="display:flex;justify-content:space-between;">
            @include("livewire.create-product")
        </div> --}}
    </div>
</div>

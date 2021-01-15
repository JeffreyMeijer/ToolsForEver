{{-- <div class="grid-container"> --}}
<div>
    <table wire:poll="mount" class="table" >
        <tr>
            <th>ID</th>
            <th>Afbeelding</th>
            <th>Artikel</th>
            <th>Voorraad</th>
            <th>Beschrijving</th>
            <th></th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->afbeelding }}</td>
                <td>{{ $product->artikel }}</td>
                <td>{{ $product->voorraad }}</td>
                <td>{{ $product->beschrijving }}</td>
                <td><button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $product->id }})" class="btn btn-primary btn-sm">Edit</button></td>
                {{-- <td><button wire:click="edit({{ $product->id }})">Edit</button></td> --}}
                <td><button wire:click="delete({{ $product->id }})">Delete</button></td>
            </tr>
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
    {{-- <button wire:click="increment">Increment</button> --}}
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
</div>

{{-- <div class="grid-container"> --}}
<div>
    @include('livewire.edit-product')
    <table class="table" >
        <tr>
            <th>Afbeelding</th>
            <th>Artikel</th>
            <th>Voorraad</th>
            <th>Beschrijving</th>
            <th></th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->afbeelding }}</td>
                <td>{{ $product->artikel }}</td>
                <td>{{ $product->voorraad }}</td>
                <td>{{ $product->beschrijving }}</td>
                <td>
                <button data-bs-toggle="modal" data-bs-target="#updateProduct" wire:click="edit({{ $product->id }})" class="btn btn-primary btn-sm">Edit</button>
                <button wire:click="delete({{ $product->id }})">Delete</button>
                </td>
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
    @include("livewire.create-product")
</div>

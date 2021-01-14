<div class="grid-container">
    @foreach ($products as $product)
    <div class="grid-row">
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
    </div>
    @endforeach
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
</div>

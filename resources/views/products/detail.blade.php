@include('includes.head')
<body>
    <div class="flex-center position-ref full-height">
        @include('includes.header')
    </div>
    <h2>Dettaglio prodotto</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Codice articolo</td>
                <td>Name</td>
                <td>Description</td>
                <td>Price</td>
                <td>Active</td>
                <td>Rank</td>
                <td>Slug</td>
                <td>Brand</td>
                <td>SEO Title</td>
                <td>SEO Description</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $product->codice_articolo }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->active }}</td>
                <td>{{ $product->rank }}</td>
                <td>{{ $product->slug }}</td>
                <td>{{ $product->brands->descrizione }}</td>
                <td>{{ $slug->seo_title }}</td>
                <td>{{ $slug->seo_description }}</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Barcode</td>
                <td>Taglia</td>
                <td>Taglia descrizione</td>
                <td>Taglia normalizzata descrizione</td>
                <td>Colore</td>
                <td>Colore descrizione</td>
                <td>Stock magazzino</td>
            </tr>
        </thead>
        <tbody>
         @foreach($product->barcodes as $barcode)
         <tr>
            <td>{{ $barcode->barcode }}</td>
            <td>{{ $barcode->taglia }}</td>
            <td>{{ $barcode->taglia_descrizione }}</td>
            <td>{{ $barcode->taglia_normalizzata_descrizione }}</td>
            <td>{{ $barcode->colore }}</td>
            <td>{{ $barcode->colore_descrizione }}</td>
            <td>{{ $barcode->stock_magazzino }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('includes.footer')
</body>
</html>
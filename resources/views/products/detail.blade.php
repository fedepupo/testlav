@include('includes.head')
<body>
    <div class="flex-center position-ref full-height">
        @include('includes.header')
    </div>
    <h2>Dettaglio prodotto</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Description</td>
                <td>Price</td>
                <td>Active</td>
                <td>Rank</td>
                <td>Slug</td>
                <td>SEO Title</td>
                <td>SEO Description</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->active }}</td>
                <td>{{ $product->rank }}</td>
                <td>{{ $product->slug }}</td>
                <td>{{ $slug->seo_title }}</td>
                <td>{{ $slug->seo_description }}</td>
            </tr>
        </tbody>
    </table>

    @include('includes.footer')
</body>
</html>
@include('includes.head')
<body>
    <div class="flex-center position-ref full-height">
        @include('includes.header')
    </div>
    <h2>Lista categorie prodotti</h2>
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
                <td>Language ID</td>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->price }}</td>
                <td>{{ $value->active }}</td>
                <td>{{ $value->rank }}</td>
                <td>{{ $value->slug }}</td>
                <td><a href="/{{ $value->slug }}">Vai al dettaglio</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @include('includes.footer')
</body>
</html>
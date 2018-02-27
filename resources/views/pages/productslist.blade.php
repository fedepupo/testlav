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
                <td>Active</td>
                <td>Rank</td>
                <td>Slug</td>
                <td>Language ID</td>
            </tr>
        </thead>
        <tbody>
            @foreach($product_categories as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->active }}</td>
                <td>{{ $value->rank }}</td>
                <td>{{ $value->slug }}</td>
                <td>{{ $value->language_id }}</td>
                <td><a href="/{{ $value->slug }}">Vai ai prodotti</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-3">
            <h2>Lista filtri</h2>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Rank</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($filters as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->rank }}</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                         <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Rank</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($value->options as $options_value)
                                <tr>
                                    <td>{{ $options_value->id }}</td>
                                    <td>{{ $options_value->name }}</td>
                                    <td>{{ $options_value->rank }}</td>
                                    <td><a href="{{ url()->current()."/".$options_value->id."-".$options_value->name }}">Vai ai prodotti</a></td>
                                    <td>{{ $options_value->count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>   

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-sm-9">
        <h2>Lista categorie prodotti</h2>
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
                    <td>Language ID</td>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $value)
                <tr>
                    <td>{{ $value->codice_articolo }}</td>
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
    </div>
</div>

@include('includes.footer')
</body>
</html>
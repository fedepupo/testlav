@include('includes.head')
<body>
    <div class="flex-center position-ref full-height">
        @include('includes.header')
    </div>
    <h2>Lista news </h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Content</td>
                <td>Date</td>
                <td>Main Image</td>
                <td>Language ID</td>
                <td>Slug</td>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->content }}</td>
                <td>{{ $value->date }}</td>
                <td>{{ $value->main_image }}</td>
                <td>{{ $value->language_id }}</td>
                <td>{{ $value->slug }}</td>
                <td><a href="/{{ $value->slug }}">Vai al dettaglio</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @include('includes.footer')
</body>
</html>
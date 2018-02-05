@include('includes.head')
<body>
    <div class="flex-center position-ref full-height">
        @include('includes.header')
    </div>
    <h2>Dettaglio news </h2>
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
                <td>SEO Title</td>
                <td>SEO Description</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $news->id }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->content }}</td>
                <td>{{ $news->date }}</td>
                <td>{{ $news->main_image }}</td>
                <td>{{ $news->language_id }}</td>
                <td>{{ $news->slug }}</td>
                <td>{{ $slug->seo_title }}</td>
                <td>{{ $slug->seo_description }}</td>
            </tr>
        </tbody>
    </table>

    @include('includes.footer')
</body>
</html>
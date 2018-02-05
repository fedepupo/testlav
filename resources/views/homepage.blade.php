@include('includes.head')
<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
        @endif

        @include('includes.header')
    </div>
    <h2>Homepage</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Content</td>
                <td>Active</td>
                <td>Parent</td>
                <td>Rank</td>
                <td>Template ID</td>
                <td>Template</td>
                <td>Language ID</td>
                <td>Slug</td>
                <td>SEO Title</td>
                <td>SEO Description</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $page->id }}</td>
                <td>{{ $page->name }}</td>
                <td>{{ $page->content }}</td>
                <td>{{ $page->active }}</td>
                <td>{{ $page->parent }}</td>
                <td>{{ $page->rank }}</td>
                <td>{{ $page->template_id }}</td>
                <td>{{ $page->template->name }} ({{ $page->template->view }})</td>
                <td>{{ $page->language_id }}</td>
                <td>{{ $page->slug }}</td>
                <td>{{ $slug->seo_title }}</td>
                <td>{{ $slug->seo_description }}</td>
            </tr>
        </tbody>
    </table>

    @include('includes.footer')
</body>
</html>

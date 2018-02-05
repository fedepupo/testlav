<!-- app/views/pages/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<?/*
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('pages') }}">Nerd Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('pages') }}">View All pages</a></li>
        <li><a href="{{ URL::to('pages/create') }}">Create a Nerd</a>
    </ul>
</nav>*/?>

<h2>Lingue attive</h2>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Code</td>
            <td>Is Primary</td>
            <td>Active</td>
        </tr>
    </thead>
    <tbody>
    @foreach($languages as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->code }}</td>
            <td>{{ $value->is_primary }}</td>
            <td>{{ $value->active }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<h2>Pagine attive</h2>

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
            <td>Title</td>
            <td>Description</td>
        </tr>
    </thead>
    <tbody>
    @foreach($pages as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->content }}</td>
            <td>{{ $value->active }}</td>
            <td>{{ $value->parent }}</td>
            <td>{{ $value->rank }}</td>
            <td>{{ $value->template_id }}</td>
            <td>{{ $value->template->name }} ({{ $value->template->view }})</td>
            <td>{{ $value->language_id }}</td>
            <td>{{ $value->slug }}</td>
            <td>{{ $value->slug->seo_title }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
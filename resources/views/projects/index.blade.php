<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <title>Projects</title>
</head>
<body>
    <div class="navbar">
        <a class="navbar-item" href="/projects">Home</a>
        <a class="navbar-item" href="/projects/create">Create</a>
    </div>


    <div class="column container">
        <h1><strong>Projects</strong></h1>

        <ul>
            @foreach ($projects as $project)
            <li><a href="/projects/{{ $project->id }} ">{{ $project->id }} - {{ $project->title }} </a></li>
            @endforeach
        </ul>
    </div>
</body>
</html>
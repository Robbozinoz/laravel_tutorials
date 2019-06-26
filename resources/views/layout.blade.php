<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=div.container, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
</head>
<body>
    <div class="navbar">
        <a class="navbar-item" href="/projects">Home</a>
        <a class="navbar-item" href="/projects/create">Create</a>
    </div>

    <div class="column container">
        @yield('content')
    </div>
</body>
</html>
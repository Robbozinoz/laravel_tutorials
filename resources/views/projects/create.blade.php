<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">

    <title>Create</title>
</head>
<body>

    <div class="navbar">
        <a class="navbar-item" href="/projects">Home</a>
        <a class="navbar-item" href="/projects/create">Create</a>
    </div>
    
    <div class="column container">
    <h1>Create a Project</h1>

    <form method="POST" action="/projects">
        {{ csrf_field() }}
        <div class="field">
            <input type="text" name="title" placeholder=" Project title">
        </div>

        <div class="field">
            <textarea name="description" placeholder=" Project Description" cols="30" rows="10"></textarea>
        </div>

        <div class="control">
            <button type="submit" class="button is-success">Create project</button>
        </div>
    </form>
</div>
</body>
</html>
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
        <h1 class="title">Create a Project</h1>
        <form method="POST" action="/projects" style="width=100%;">
            {{ csrf_field() }}
            <div class="field">
                <label for="title" class="label">Title</label>

                <div class="control">
                    <input type="text" name="title" placeholder=" Project title" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" value="{{ old('title') }}">
                </div>
            </div>

            <div class="field">
                <label for="description" class="label">Description</label>
                
                <div class="control">
                    <textarea name="description" placeholder=" Project Description" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-success">Create project</button>
                </div>
            </div>

            <!--Error notification on backend validation-->
            <!--Check for errors-->
            @if ($errors->any())
                <div class="notification is-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>     
            @endif
        </form> 
    </div>
</body>
</html>
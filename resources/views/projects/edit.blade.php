@extends('layout')

@section('content')
    <h1 class="title">Edit Project</h1>
    <form method="POST" action="/projects/{{ $project->id }}" style="margin-bottom: 1rem;">

        @method('PATCH')

        @csrf
        

        <div class="field">
            <label for="title" class="label">Title</label>

            <div class="control">
                <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" placeholder="Title" value="{{ $project->title }}">
            </div>
        </div>

        <div class="field">
            <label for="description" class="label">Description</label>

            <div class="control">
                <textarea name="description" class="textarea">{{ $project->description }}</textarea>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-success">Update project</button>
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
    <form method="POST" action="/projects/{{ $project->id }}">
        <div class="field">
            <div class="control">

                @method('DELETE')

                @csrf
                
                <button type="submit" class="button is-info">Delete project</button>
            </div>
        </div>
    </form>
@endsection
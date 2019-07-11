@extends('layout')

@section('content')
    <h1 class="title">{{ $project->title }}</h1>

    <!--Conditional use of to allow project update policy to be used-->
    @can('update', $project)
        <a href="" class="button is-link">Update</a>
    @endcan

    <div class="content">{{ $project->description }}</div>

    <button class="button" style="margin-bottom: 1rem;"><a href="/projects/{{ $project->id }}/edit ">Edit</a></button>

    @if ($project->tasks->count())
        @foreach ($project->tasks as $task)
            <div class="box">
                <form method="POST" action="/completed-tasks/{{ $task->id }}">
                    <!--If loop to work with CompletedTask route (REST)-->
                    @if ($task->completed)
                        @method('DELETE')
                    @endif
                    
                    @csrf

                    <label for="completed" class="checkbox {{ $task->completed ? 'is-complete' : '' }}">
                        <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        {{ $task->description }}
                    </label>
                </form>
            </div>
        @endforeach   
    @endif

   
    <!--Add a new task-->
    <form action="/projects/{{ $project->id }}/tasks" method="post" class="box">

        @csrf

        <div class="field">
            <label for="description" class="label">New task</label>

            <div class="control">
                <input type="text" class="input {{ $errors->has('description') ? 'is-danger' : '' }}" name="description" placeholder="New task" required>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>
        </div>

        <!-- Blade partial for errors-->
        @include('errors')

    </form>
@endsection
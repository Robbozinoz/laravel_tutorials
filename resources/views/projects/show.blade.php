@extends('layout')

@section('content')
    <h1 class="title">{{ $project->title }}</h1>

    <div class="content">{{ $project->description }}</div>

    <button class="button" style="margin-bottom: 1rem;"><a href="/projects/{{ $project->id }}/edit ">Edit</a></button>

    @if ($project->tasks->count())
        @foreach ($project->tasks as $task)
            <div style="margin-top: 0.5rem;">
                <form method="POST" action="/tasks/{{ $task->id }}">
                    @method('PATCH')

                    @csrf

                    <label for="completed" class="checkbox {{ $task->completed ? 'is-complete' : '' }}">
                        <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        {{ $task->description }}
                    </label>
                </form>
            </div>
        @endforeach   
    @endif

   
@endsection
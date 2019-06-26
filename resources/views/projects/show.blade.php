@extends('layout')

@section('content')
    <h1 class="title">{{ $project->title }}</h1>

    <div class="content">{{ $project->description }}</div>

    @if ($project->tasks->count())
        <div class="content">
            <ul>
            @foreach ($project->tasks as $task)
                <li>{{ $task->description }}</li>
            @endforeach
            </ul>
        </div>    
    @endif

    <button class="button"><a href="/projects/{{ $project->id }}/edit ">Edit</a></button>
@endsection
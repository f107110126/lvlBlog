@extends('projects.layout')

@section('content')
    <h1 class="title">{{ $project->title }}</h1>

    <div class="content">{{ $project->description }}</div>

    <p>
        <a href="../projects/{{ $project->id }}/edit">Edit</a>
    </p>

    @if($project->tasks->count())
        <div class="box">
            @foreach($project->tasks as $task)
                <form method="post" action="../tasks/{{ $task->id }}">
                    @csrf
                    @method('PATCH')
                    <label class="checkbox {{ $task->completed ? 'is-complete' : '' }}" for="completed{{ $task->id }}">
                        <input class="checkbox" type="checkbox" id="completed{{ $task->id }}" name="completed"
                               {{ $task->completed ? 'checked' : '' }} onchange="this.form.submit();">
                        {{ $task->description }}
                    </label>

                </form>
            @endforeach
        </div>
    @endif

    <form method="post" action="../projects/{{ $project->id }}/tasks" class="box">
        @csrf
        <div class="field">
            <label class="lebel" for="description">New Task</label>

            <div class="control">
                <input type="text" class="input" name="description" placeholder="New Task">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>
        </div>

        @include('projects.errors')

    </form>
@endsection
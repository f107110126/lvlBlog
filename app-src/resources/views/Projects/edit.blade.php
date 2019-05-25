@extends('projects.layout')

@section('content')
    <h1>Edit Project</h1>
    <form method="post" action="../../projects/{{ $project->id }}" style="margin-bottom: 1em;">
        <?php
            /*
             * {{ method_field('PATCH') }} is identically to @method('PATCH')
             * {{ csrf_field() }} is identically to @csrf
             */
        ?>
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="field">
            <label class="label" for="title">Project Title</label>
            <div class="control">
                <input id="title" type="text" class="input" name="title" value="{{ $project->title }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="description">Description</label>
            <div class="control">
                <textarea id="description" class="textarea" name="description">{{ $project->description }}</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Project</button>
            </div>
        </div>
    </form>

    <form method="post" action="../../projects/{{ $project->id }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <div class="field">
            <div class="control">
                <button type="submit" class="button">Delete Project</button>
            </div>
        </div>
    </form>
@endsection
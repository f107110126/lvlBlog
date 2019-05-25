<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create a New Project</title>

    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
</head>
<body>
<div class="container">
    <h1 class="title">Create a New Project</h1>
    <form method="post" action="../projects">
        <?php
        /*
         * {{ csrf_field() }} will generate a secret token for application for laravel
         * it will be a hidden input on the web send with form
         * so if you want remove it and let the web work fine, just comment follow line in Kernel.php
         * : \App\Http\Middleware\VerifyCsrfToken::class,
         * this line is in the app/Http/Kernel.php
         */
        ?>
        {{ csrf_field() }}
        <div class="field">
            <label class="label" for="projectTitle">Project Title</label>
            <input class="input {{ $errors->has('title') ? 'is-danger' : '' }}" id="projectTitle" type="text"
                   name="title" value="{{ old('title') }}" placeholder="Project title">
        </div>
        <div class="field">
            <label class="label" for="projectDescription">Project Description</label>
            <textarea class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" id="projectDescription"
                      name="description" placeholder="Project description"></textarea>
        </div>
        <div class="field">
            <button class="button is-link" type="submit">Create a New Project</button>
        </div>

        <?php
        // for display error message
        ?>

        @include('projects.errors')

    </form>
</div>
</body>
</html>

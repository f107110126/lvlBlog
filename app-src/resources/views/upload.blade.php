<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>
</head>
<body>
<form method="post" action="{{ url('/upload') }}" enctype="multipart/form-data">
    @csrf
    <h1>Upload form</h1>
    <input type="file" name="UploadFile">
    <button type="submit">Submit</button>
</form>
</body>
</html>

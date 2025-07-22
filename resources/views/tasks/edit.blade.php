<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ url('assets/css/input.css') }}">
    <title>Document</title>
</head>
<body class='body'>
        @include('include.nav')

<form action="{{ route('update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input class='textarea' type="text" name="value" value="{{( $task->value) }}" placeholder="description">
    @error('value')
        <span style="color: red">Please input something</span>
    @enderror

    <button class='button' type="submit">Update</button>
</form>
    {{-- @include('include.foot') --}}

</body>
</html>

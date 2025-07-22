
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <link rel="stylesheet" href="{{ url('assets/css/input.css') }}">
</head>

<body class='body'>


        @include('include.nav')

<form action='{{route('store')}}' method='post'>
@csrf
    <input class='textarea' type="textarea" id="value" name='value' placeholder="description">
    @error('value')
    <span style="color: red">please input something</span>

    @enderror
    <button class='button' type="submit">create</button>
</form>
    {{-- @include('include.foot') --}}
</body>
</html>


</body>

</html>

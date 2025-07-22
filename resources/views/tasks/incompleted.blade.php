<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incomplete Tasks</title>
    <link rel="stylesheet" href="{{ url('assets/css/index.css') }}">
</head>

<body class='body'>



    @include('include.nav')
    <div class='head'>
        <h1>Here are all yout incomplete tasks!</h1>

    </div>

    @foreach ($tasks as $task)
        <div class='tasks'>



            <p style="margin: 10px">{{ $task->value }}</p>
            <div class ='tasksbuttons'>
                <form action= "{{ route('complete', $task->id) }}" method="POST">
                    @method('patch')
                    @csrf
                    <button class='button' type="submit">complete</button>
                </form>




                <form action="{{ route('destroy', $task->id) }}" , method="POST">
                    @method('delete')
                    @csrf
                    <button class='button' type="submit">Delete</button>
                </form>


                <button class="button" onclick="window.location='{{ route('edit', $task->id) }}'"> Edit</button>
            </div>
    @endforeach
    </div>


    @include('include.foot')
</body>

</html>

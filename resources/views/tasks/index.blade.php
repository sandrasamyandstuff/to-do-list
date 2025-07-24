<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link rel="stylesheet" href="{{ url('assets/css/index.css') }}">
</head>

<body class ='body'>

    @include('include.nav')
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class='head'>
        <h1>WELCOME</h1>
        <h2>Here are all your tasks!</h2>
    </div>

@if($tasks->isEmpty())

    <p class ='empty'> you have no tasks!</p>



@else


    @foreach ($tasks as $task)
        <div class ='tasks'>
            <p style="font-size: 40px">{{ $task->value }}</p>

            <div class ='tasksbuttons'><br>


                @if ($task->completed_at == null)
                    <form action= "{{ route('complete', $task->id )}}", method="POST">
                        @method('patch')
                        @csrf
                        <button class='button' type="submit">Mark as Completed</button>
                    </form>
                @else

                   <br><span style="margin: 10px">completed at {{ $task->completed_at }}</span>
                    <form action= "{{ route('incomplete', $task->id) }}" method="POST">
                        @method('patch')
                        @csrf
                        <button class='button' type="submit">Mark as Incomplete</button>

                    </form>
                @endif





               <br> <form action="{{ route('destroy', $task->id) }}" , method="POST">
                    @method('delete')
                    @csrf
                    <button class='button' type="submit">Delete</button>
                </form>
                <button class="button" onclick="window.location='{{ route('edit',  $task->id )}}'"> Edit</button>
            </div>
        </div>
    @endforeach

@endif











     @include('include.foot')

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('assets/css/input.css') }}">
    <title>Login</title>
</head>

<body class='body'>
    <div class='head'>
        <h1>WELCOME</h1>
        <h2> Please Login</h2>
    </div>
    <div class="allcontent">
        <div class='form'>
            <form action="{{ route('auth.login') }}" method="post">
                @csrf
                <input class="textarea" type="email" name="email" id="email" placeholder="User Email">

                <input class="textarea" type="password" name="password" id="password" placeholder="User Password">
                @if ($errors->any())
                 <span style='color:red'>{{$errors}}</span>
                 @endif

                <button class='button' type="submit">sign in</button>
            </form>
        </div>
        <span>Dont have an account?</span><br>
        <button class="button" onclick="window.location.href='{{ route('register') }}'">Register</button>
    </div>


    @include('include.foot')
</body>

</html>

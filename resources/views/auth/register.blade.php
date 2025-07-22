<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('assets/css/input.css') }}">
    <title>Register</title>
</head>

<body class='body'>
    <div class='head'>
        <h1>WELCOME</h1>
        <h2> Please Register</h2>
    </div>
    <div class="allcontent">
        <div class='form'>
            <form action="{{ route('auth.register') }}" method="POST">
                @csrf
                <input class='textarea'type="text" name="name" id="name" placeholder="name"><br>
                @error('name')
                    <span style='color:red;'>please insert a name</span>
                @enderror
                <input class='textarea' type="email" name="email" id="email" placeholder="User Email"><br>
                @error('email')
                    <span style='color:red;'>please insert a proper email</span>
                @enderror
                <input class='textarea' type="password" name="password" id="password" placeholder="User Password"><br>
                @error('password')
                    <span style='color:red;'>insert a proper password with minimum of 6 characters</span>
                @enderror
                <button class='button' type="submit">submit</button><br>
            </form>
        </div>
        <span>already have an account?</span><br>
        <button class="button" onclick="window.location.href='{{ route('login') }}'">Login</button><br>
    </div>
    {{-- @include('include.foot') --}}
</body>

</html>

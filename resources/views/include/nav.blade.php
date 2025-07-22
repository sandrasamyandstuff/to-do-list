<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> index</title>
  <!---Custom Css File!--->
  <link rel="stylesheet" href={{url('assets/css/nav.css')}}>
</head>
<body class='nav'>

    <nav>
      <ul>

        <li><a class='links' href={{route('index')}}>All Tasks</a></li>
        <li><a class='links' href={{route('create')}} >New Task</a></li>

        <li><a class='links' href={{route('showcomp')}}>completed</a></li>
        <li><a class='links' href={{route('showincomp')}} >incompleted</a></li>
        <li><a class='links' href={{route('logout')}}>Log out</a></li>


      </ul>
    </nav>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successful Signin</title>
</head>
<body>
    <h1>Welcome!</h1>
    <h2>{{$user->f_name}} {{$user->l_name}}</h2>
    <a href="/information"><button>Reveal Information</button></a>
</body>
</html>
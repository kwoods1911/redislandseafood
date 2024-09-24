<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ 'email.css' }}" type="text/css">
    <title>Document</title>
</head>
<body>
    <h1>Email from {{$name}}</h1>
    <span>Name: {{$name}}</span>
    <br>
    <span>{{ $email }}</span>
    <br>
    <p>{{$message}}</p>
</body>
</html>


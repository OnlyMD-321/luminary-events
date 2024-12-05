<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h3>{{$mailData['title']}} pour Mr/Mlle {{$mailData['name']}}</h3>
    <p>Tél {{$mailData['phone']}} </p>
    <p>Mail {{$mailData['mail']}} </p>
    <p>Message {{$mailData['message']}} </p>
</body>
</html>

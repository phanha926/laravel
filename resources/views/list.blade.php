<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>description</td>

            @foreach ($test as $tests )
            <tr>
                <td>{{$tests->id}}</td>
                <td>{{$tests->name}}</td>
                <td>{{$tests->description}}</td>

            </tr>
            @endforeach
        </tr>
    </table>
</body>
</html>
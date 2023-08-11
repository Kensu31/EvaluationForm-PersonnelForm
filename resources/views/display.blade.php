<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif
        }
    </style>
</head>
<body>
    

    <div class="container">
        
        <h1>Records</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>rating</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $rec )
            <tr>
                <td> <a href=""><p>{{$rec->employee_name}}</a></td>
                <td> <p>{{$rec->ratingScore}}</p></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>
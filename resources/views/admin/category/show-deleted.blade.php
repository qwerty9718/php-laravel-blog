<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<table>
    <tr>
        <td>title</td>
        <td>Action</td>
    </tr>


    @foreach($categories as $category)
        <tr>
            <td>{{$category->title}}</td>
            <td><a href="{{route('restore',$category->id)}}">restore</a></td>
        </tr>
    @endforeach

</table>


</body>
</html>

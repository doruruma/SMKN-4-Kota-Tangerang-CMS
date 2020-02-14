<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield($title)</title>
</head>
<body>
    <form action="/teacher/update/{{$teacher->id}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

        <img src="{{ asset('/teachers/'.$teacher->image) }}" alt="img">
        <label for="name">Nama :</label>
        <input type="text" name="name" id="name" value="{{$teacher->name}}">

        <label for="subject">Mata Pelajaran :</label>
        <input type="text" name="subject" id="subject" value="{{$teacher->subject}}">

        <input type="file" name="img" id="img" >

        <button type="submit">Update</button>
    </form>
</body>
</html>
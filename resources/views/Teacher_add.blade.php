<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield($title)</title>
</head>
<body>
    <form action="/teacher/store" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

        <label for="name">Nama :</label>
        <input type="text" name="name" id="name">

        <label for="subject">Mata Pelajaran :</label>
        <input type="text" name="subject" id="subject">

        <input type="file" name="img" id="img">

        <button type="submit">Add</button>
    </form>
</body>
</html>
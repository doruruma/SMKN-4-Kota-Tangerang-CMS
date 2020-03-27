<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('official.add')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama">
        
        <label for="position">Position</label>
        <Select  name="position" id="position">
            @foreach($position as $positions)
            <option value="{{$positions->id}}">{{$positions->position}}</option>
            @endforeach
        </Select>

       <input type="file" name="img" id="img">

        <button type="submit">add</button>
    </form>
</body>
</html>
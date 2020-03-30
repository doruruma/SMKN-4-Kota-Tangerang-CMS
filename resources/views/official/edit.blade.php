<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('official.update', $official->id)}}" method="POST" enctype="multipart/form-data">
        @csrf

       
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="{{$official->name}}">
        
        <label for="position">Position</label>
        <Select  name="position" id="position">
            @foreach($position as $positions)
            <option value="{{$positions->id }}" {{ ($official->position_id == $positions->id) ? 'selected' : ''}}>{{$positions->position}}</option>
            @endforeach
        </Select>

       <input type="file" name="img" id="img" value="{{$official->image}}">

        <button type="submit">add</button>
    </form>
</body>
</html>
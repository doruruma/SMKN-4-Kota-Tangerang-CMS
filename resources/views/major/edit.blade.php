<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Major</title>
</head>
<body>
    <h1>edit Major</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
              @foreach ($errors->all() as $error)
                <p style="color:red">{{ $error }}</p>
              @endforeach
        </div><br/>
        @endif
    <form action="{{ route('major.update', $major->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="name" id="name" placeholder="name" value="{{ $major->name }}"> <br>
        <label for="image">Image</label>
        <img src="{{asset('majors/'.$major->image)}}" alt=""><br>
        <input type="file" name="image" id="image" placeholder="image"> <br>
        <textarea name="description" id="description" cols="30" rows="10" placeholder="description">{{$major->description}}</textarea>
        <br>
        <button type="submit">Update Major</button>
    </form>
</body>
</html>

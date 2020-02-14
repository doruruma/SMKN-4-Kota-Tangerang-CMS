<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Majors List</title>
</head>
<body>
    <h1>Major List</h1>
    @if (session('success'))
        <span>Data Berhasil Di Tambahkan</span>
    @endif
    <ul>
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            @foreach ($major as $item)

            <tr>
                <td>{{$item->name}}</td>
                <td><img src="{{asset('majors/'.$item->image)}}" alt=""></td>
                <td>{{$item->description}}</td>
                <td>
                    <form action="{{route('major.destroy', $item->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('major.edit', $item->id)}}">Edit</a>
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>


    </ul>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <?php $no = 1; ?>
    <table>
        <tr>
            
            @foreach ($official as $item)
            <td>{{$no++}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->position->position}}</td>
            <td>
                <a href="/admin/official/put/{{$item->id}}">Update</a>
                <a href="/admin/official/delete/{{$item->id}}"  onclick="return confirm('Remove this official ?')">Delete</a>
            </td>
            @endforeach 
        </tr>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield($title)</title>
</head>
<body>
    <?php $no = 1; ?>
    <table>
        <tr>
            
            @foreach ($teacher as $teachers)
            <td>{{$no++}}</td>
            <td>{{$teachers->name}}</td>
            <td>{{$teachers->subject}}</td>
            <td>
                <a href="/teacher/edit/{{$teachers->id}}">Update</a>
                <a href="/teacher/delete/{{$teachers->id}}">Delete</a>
            </td>
            @endforeach 
        </tr>
    </table>
</body>
</html>
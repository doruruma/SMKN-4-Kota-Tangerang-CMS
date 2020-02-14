<head>
    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 0; @endphp
            @foreach ($posts as $post)
                <tr>
                    <td>{{++$no}}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->category }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->published == 1 ? "Published" : "Draft" }}</td>
                    <td>
                        <a href="/admin/post/delete/{{ $post->id }}" onclick="return confirm('Remove this post?')">Remove</a> <a href="/admin/post/{{ $post->id }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(() => {
            $("#title").on('input', function() {
                $("#slug_preview").val(slug( $(this).val() ))
            })

            $("#post_submit").on('submit', function(e) {
                e.preventDefault()

                $.ajax({
                    url: "/admin/post",
                    method: "POST",
                    data: {
                        title: $("#title").val(),
                        content: $("#editor").val(),
                        category_id: $("#cat").val(),
                        published: $("#publish").is(':checked') ? 1 : 0,
                        _token: $("#_token").val()
                    },
                    success: function(res) {
                        console.log(res)
                    },
                    error: function(rej) {
                        console.log(rej)
                    }
                })
            })

            $.ajax({
                url: "/api/categories",
                type: "GET",
                success: function(res) {
                    $("#cat").html("")
                    res.map((value, index) => {
                        $("#cat").append(`
                            <option value="${value.id}">${value.category}</option>
                        `)
                    })
                }
            })

            function slug(text) {
                return text.toString().toLowerCase()
                            .replace(/\s+/g, '-')           // Replace spaces with -
                            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                            .replace(/^-+/, '')             // Trim - from start of text
                            .replace(/-+$/, '');            // Trim - from end of text
            }
            let res = CKEDITOR.replace('editor', {
                removeButtons: 'Image'
            })
        })
    </script>
</body>

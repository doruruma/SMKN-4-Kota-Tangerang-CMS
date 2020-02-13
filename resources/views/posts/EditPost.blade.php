<head>
    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <form action="" id="post_submit" method="post">

        <input type="hidden" id="id" value="{{$post->id}}">
        <input type="hidden" id="_token" value="{{ csrf_token() }}">
        <input type="text" name="title" id="title" value="{{$post->title}}"/>
        <input type="text" readonly name="slug_preview" id="slug_preview" value="{{$post->slug}}"/>

        <select name="cat" id="cat">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? "selected" : "" }}>{{$category->category}}</option>
            @endforeach
        </select>

        <input type="checkbox" name="publish" id="publish" {{ ($post->published == 1) ? "checked" : "" }}/> <label for="publish">Publish</label>

        <textarea id="editor" name="editor">
            {!! $post->content !!}
        </textarea>

        <button type="submit">Submit</button>
    </form>

    <script>
        $(document).ready(() => {
            $("#title").on('input', function() {
                $("#slug_preview").val(slug( $(this).val() ))
            })

            let res = CKEDITOR.replace('editor', {
                removeButtons: 'Image'
            })

            $("#post_submit").on('submit', function(e) {
                e.preventDefault()

                $.ajax({
                    url: "/admin/post/"+$("#id").val(),
                    method: "POST",
                    data: {
                        title: $("#title").val(),
                        content: res.getData(),
                        category_id: $("#cat").val(),
                        published: $("#publish").is(':checked') ? 1 : 0,
                        _token: $("#_token").val(),
                        _method: "PUT"
                    },
                    success: function(res) {
                        console.log(res)
                    },
                    error: function(rej) {
                        console.log(rej)
                    }
                })
            })

            function slug(text) {
                return text.toString().toLowerCase()
                            .replace(/\s+/g, '-')           // Replace spaces with -
                            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                            .replace(/^-+/, '')             // Trim - from start of text
                            .replace(/-+$/, '');            // Trim - from end of text
            }
        })
    </script>
</body>

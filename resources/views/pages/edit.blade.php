{{-- Author : Andra Yuusha --}}

@extends('layouts.app')

@section('title', 'LPC | Edit Page')

@section('bodyClass', 'bg-light')

@section('plugin')
  <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js" defer></script>
@endsection

@section('pageJS')
<script>
    $(document).ready(() => {
        $("#title").on('input', function() {
            $("#slug_preview").val(slug( $(this).val() ))
        })

        let res = CKEDITOR.replace('editor', {
            filebrowserUploadUrl: "/admin/upload/image/ckeditor?_token="+$("input[name='_token']").val(),
            filebrowserUploadMethod: "form"
        })

        $("#page_submit").on('submit', function(e) {
            e.preventDefault()

            $.ajax({
                url: "/admin/page/"+$("#id").val(),
                method: "POST",
                data: {
                    user_id: "{{ Auth::user()->id }}",
                    title: $("#title").val(),
                    content: res.getData(),
                    published: $("#publish").is(':checked') ? 1 : 0,
                    _token: $("input[name='_token']").val(),
                    _method: "PUT"
                },
                success: function (res) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    })
                },
                error: function (rej) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        showConfirmButton: false,
                        timer: 1500
                    })
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
@endsection

@section('content')
  @include('layouts.sidebar')
  @include('layouts.nav')

  <div class="container-fluid mb-5" style="min-height:600px">
    <h1 class="h3 mb-3 text-gray-800">Edit Page Form</h1>
    <div class="row no-gutters">
      <div class="col-lg-12 col-md-6 col-sm-12 px-1 py-1">
        <div class="card shadow-sm border-light">
          <div class="card-body">
            <form action="" id="page_submit" method="POST">
              @csrf

              <input type="hidden" name="" id="id" value="{{ $page->id }}">

              <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" name="title" id="title" class="form-control form-control-sm" value="{{ old('title') ?? $page->title }}">
                  <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>
              </div>

              <div class="form-group row">
                <label for="slug_preview" class="col-sm-2 col-form-label">Slug Preview</label>
                <div class="col-sm-10">
                  <input type="text" name="slug_preview" id="slug_preview" class="form-control form-control-sm" value="{{ old('slug_preview') ?? $page->slug }}">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-10 offset-md-2">
                  <div class="form-check">
                    <input class="form-check-input" name="publish" type="checkbox" id="publish" {{ ($page->published == 1) ? "checked" : "" }}>
                    <label class="form-check-label" for="publish">
                      Publish
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="editor" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                  <textarea name="editor" id="editor">{!! $page->content !!}</textarea>
                </div>
              </div>

              <div class="form-group row">
                    <div class="offset-md-2 col row">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('layouts.footer')
@endsection

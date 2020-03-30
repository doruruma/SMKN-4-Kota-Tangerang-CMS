{{-- Author : Andra Yuusha --}}

@extends('layouts.app')

@section('title', 'LPC | Add New Post')

@section('bodyClass', 'bg-light')

@section('plugin')
  <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js" defer></script>
@endsection

@section('pageJS')
  <script src="{{ asset('/js/postCreate.js') }}" defer></script>
@endsection

@section('script')
  <script>
    $(document).ready(function(){

      $('.post').addClass('active')
      $('#file').change(function(){
        $('.img-thumbnail').attr('src', window.URL.createObjectURL(this.files[0]))
      })

    })
  </script>
@endsection

@section('content')
  @include('layouts.sidebar')
  @include('layouts.nav')
  <div class="container-fluid mb-5" style="min-height:600px">
    <h1 class="h3 mb-3 text-gray-800">Add Post Form</h1>
    <div class="row no-gutters">
      <div class="col-lg-12 col-md-6 col-sm-12 px-1 py-1">
        <div class="card shadow-sm border-light">
          <div class="card-body">
            <form action="" id="post_submit" method="POST">
              @csrf
                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
              <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" name="title" id="title" class="form-control form-control-sm">
                  <small class="text-danger title"></small>
                </div>
              </div>

              <div class="form-group row">
                <label for="slug_preview" class="col-sm-2 col-form-label">Slug Preview</label>
                <div class="col-sm-10">
                  <input type="text" name="slug_preview" id="slug_preview" class="form-control form-control-sm" readonly>
                </div>
              </div>

              <div class="form-group row">
                <label for="cat" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-2">
                  <select name="cat" id="cat" class="form-control form-control-sm">
                    <option value="" selected disabled>Select Category</option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-3 offset-2">
                  <img src="{{ asset('img/default_profile.png') }}" class="img-thumbnail" style="">
                </div>
              </div>

              <div class="form-group row">
                <label for="file" class="col-sm-2 col-form-label">Thumbnail</label>
                <div class="col-sm">
                    <input type="file" name="file" id="file" class="d-block"/>
                    <small class="text-danger file"></small>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-10 offset-md-2">
                  <div class="form-check">
                    <input class="form-check-input" name="publish" type="checkbox" id="publish">
                    <label class="form-check-label" for="publish">
                      Publish
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="editor" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                  <textarea name="editor" id="editor"></textarea>
                  <small class="text-danger content"></small>
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('layouts.footer')
@endsection

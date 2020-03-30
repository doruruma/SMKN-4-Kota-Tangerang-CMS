{{-- Author : Andra Yuusha --}}

@extends('layouts.app')

@section('title', 'LPC | Add New Major')

@section('bodyClass', 'bg-light')

@section('plugin')
  <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js" defer></script>
@endsection

@section('script')
  <script>
    $(document).ready(function () {

      $('.major').addClass('active')

      CKEDITOR.replace('description', {
        removeButtons: 'Image'
      })

      $('.custom-file-input').on('change', function () {
        let fileName = $(this).val().split('\\').pop()
        $(this).next('.custom-file-label').addClass('selected').html(fileName)
        $('.img-thumbnail').attr('src', window.URL.createObjectURL(this.files[0]))
      })

    })
  </script>
@endsection

@section('content')
  @include('layouts.sidebar')
  @include('layouts.nav')
  <div class="container mb-5" style="min-height:600px">
    <h1 class="h3 mb-3 text-gray-800">Add Major</h1>
    <div class="row no-gutters">
      <div class="col-lg-12 col-md-6 col-sm-12 px-1 py-1">
        <div class="card shadow-sm border-light">
          <div class="card-body">
            <form action="{{ route('major.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" id="name" class="form-control form-control-sm" value="{{ old('name') }}">
                  <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
              </div>

              <div class="form-group row mt-3" style="margin-bottom:5px">
                <div class="col-3 offset-md-2">
                  <img src="{{ asset('img/default_profile.png') }}" class="img-thumbnail" style="width:200px">
                </div>
              </div>

              <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="image" aria-describedby="inputGroupImage">Choose file</label>
                  </div>
                  <small class="text-danger">{{ $errors->first('image') }}</small>
                </div>
              </div>

              <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea name="description" id="description"></textarea>
                  <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>
              </div>

              <div class="form-group">
                <button class="btn btn-sm btn-primary" type="submit">Submit</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('layouts.footer')
@endsection
{{-- Author : Andra Yuusha --}}

@extends('layouts.app')

@section('title', 'LPC | Add New Teacher')

@section('bodyClass', 'bg-light')

@section('pageJS')
  <script src="{{ asset('/js/teacherCreate.js') }}" defer></script>
@endsection

@section('script')
  <script>
    $(document).ready(function () {
      $('.teacher').addClass('active')
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
    <h1 class="h3 mb-3 text-gray-800">Add Teacher Form</h1>
    <div class="row no-gutters">
      <div class="col-lg-12 col-md-6 col-sm-12 px-1 py-1">
        <div class="card shadow-sm border-light">
          <div class="card-body">
            <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" id="name" class="form-control form-control-sm" value="{{ old('name') }}">
                  <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
              </div>

              <div class="form-group row">
                <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                <div class="col-sm-10">
                  <input type="text" name="subject" id="subject" class="form-control form-control-sm" value="{{ old('subject') }}">
                  <small class="text-danger">{{ $errors->first('subject') }}</small>
                </div>
              </div>

              <div class="form-group row mt-3" style="margin-bottom:5px">
                <div class="col-3 offset-md-2">
                  <img src="{{ asset('img/default_profile.png') }}" class="img-thumbnail" style="width:200px">
                </div>
              </div>

              <div class="form-group row">
                <label for="img" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="img" name="img">
                      <label class="custom-file-label" for="img" aria-describedby="inputGroupImg">Choose file</label>
                    </div>
                  </div>
                  <small class="text-danger">{{ $errors->first('img') }}</small>
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
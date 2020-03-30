{{-- Author : Andra Yuusha --}}

@extends('layouts.app')

@section('title', 'LPC | Add Official Data')
    
@section('bodyClass', 'bg-light')

@section('script')
  <script>
    $(document).ready(function(){

      $('.official').addClass('active')
      $('.custom-file-input').change(function(){
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
    <h1 class="h3 mb-3 text-gray-800">Add Official</h1>
    <div class="row-no-gutters">
      <div class="col-lg-12 col-md-6 col-sm-12 px-1 py-1">
        <div class="card shadow-sm border-light">
          <div class="card-body">
            <form action="{{ route('official.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="form-group row">
                <label for="name" class="col-form-label col-2">Name</label>
                <div class="col-10">
                  <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
                  <small class="text-danger">{{ $errors->first('nama') }}</small>
                </div>
              </div>

              <div class="form-group row">
                <label for="position" class="col-form-label col-2">Position</label>
                <div class="col-10">
                  <select name="position" id="position" class="form-control">
                    <option value="" selected disabled>Choose Position...</option>
                    @foreach($position as $positions)
                      <option value="{{$positions->id}}">{{$positions->position}}</option>
                    @endforeach
                  </select>
                  <small class="text-danger">{{ $errors->first('position') }}</small>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-3 offset-2">
                  <img src="{{ asset('img/default_profile.png') }}" class="img-thumbnail">
                </div>
              </div>

              <div class="form-group row">
                <label for="img" class="col-form-label col-2">Image</label>
                <div class="col-10">
                  <div class="custom-file">
                    <input type="file" name="img" id="img" class="custom-file-input">
                    <label for="img" class="custom-file-label">Choose File</label>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-3 offset-2">
                  <button class="btn btn-sm btn-primary" type="submit">Submit</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
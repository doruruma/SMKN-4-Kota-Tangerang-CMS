@extends('layouts.app')

@section('title', 'LPC | Gallery')

@section('bodyClass', 'bg-light')

@section('script')
  <script>
    $(document).ready(function() {
      $('.custom-file-input').change(function(){
        let fileName =  $(this).val().split('\\').pop()
        $(this).next('.custom-file-label').addClass('selected').html(fileName)
        $('.imgPreview').attr('src', window.URL.createObjectURL(this.files[0]))
      })
    })
  </script>
@endsection

@section('content')

  @include('layouts.sidebar')

  @include('layouts.nav')

  <div class="container mb-5">
    <h1 class="h3 mb-4 text-grey-800">Gallery</h1>
    <button class="btn btn-primary btn-radius" data-toggle="modal" data-target="#tambahGambar"><i class="fas fa-fw fa-image"></i> Tambah Gambar</button>
    <button class="btn btn-primary btn-radius" data-toggle="modal" data-target="#tambahVideo"><i class="fas fa-fw fa-video"></i> Tambah Video</button>
    <hr>
    <div class="row">
      @foreach ($media as $m)
        <div class="col-lg-3 col-md-4 col-sm-6 text-center">
          <img src="../img/media/{{ $m->name }}" alt="{{ $m->name }}" class="img-thumbnail rounded" style="height:95%">
          <form action="gallery" id="f-m{{ $m->id }}" method="post">
            @method('DELETE')
            @csrf
            <input type="hidden" name="image" value="{{ $m->slug }}">
          </form>
          <button type="button" onclick="document.getElementById('f-m{{ $m->id }}').submit()" class="btn btnDelete btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></button>
        </div>
      @endforeach
    </div>
  </div>

  <form action="gallery" method="post" enctype="multipart/form-data">
  @csrf

  <div class="modal fade" id="tambahGambar" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Form Gambar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group text-center">
            <img src="{{ asset('img/default_profile.png') }}" alt="" class="img-thumbnail imgPreview" style="max-width:75%; height:auto">
          </div>
          <div class="form-group">
            <div class="custom-file">
              <input type="file" name="image" id="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
              @error('image')
              <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn text-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>

</form>
@endsection






































{{-- @extends('layouts.gallery') --}}

{{-- @section('content') --}}
{{-- <div class="jumbotron">
  <h1 class="display-4">Hello, world!</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myGallery">Check my Gallery</button>
</div>
<div class="container m-2">

  <div class="row">
    <div class="col-12 text-center">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahGambar">Tambah Gambar</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahVideo">Tambah Video</button>
    </div>
  </div>

</div>
<div class="modal fade" id="myGallery" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          @foreach( $media as $m )
          <div class="col-sm-12 col md-4 col-lg-3 text-center" style="">
            <img src="../img/media/{{ $m->name }}" alt="{{ $m->name }}" class="img-thumbnail rounded">
            <form action="gallery" id="f-m{{ $m->id }}" method="post">
              @method('DELETE')
              @csrf
              <input type="hidden" name="image" value="{{ $m->slug }}">
            </form>
            <button type="button" onclick="document.getElementById('f-m{{ $m->id }}').submit()" class="btn btn-danger btn-sm">Delete</button>
          </div>
          @endforeach
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn text-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<form action="gallery" method="post" enctype="multipart/form-data">
  @csrf

  <div class="modal fade" id="tambahGambar" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group mt-3">
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn text-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>

</form> --}}
{{-- @endsection --}}
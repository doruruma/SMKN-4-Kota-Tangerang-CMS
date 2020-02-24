{{-- Author : Andra Yuusha --}}

@extends('layouts.app')

@section('title', 'LPC | Edit Profile')

@section('bodyClass', 'bg-light')

@section('plugin')
@endsection

@section('pageJS')
@endsection

@section('content')
  @include('layouts.sidebar')
  @include('layouts.nav')
  <div class="container mb-5" style="min-height:500px">
    <div class="swal" data-title="{{ Session::get('title') }}" data-message="{{ Session::get('message') }}"></div>
    <h1 class="h3 mb-5 text-gray-800"><a href="{{ route('admin.index') }}">Profile</a>/Edit Profile</h1>
    <div class="row no-gutters">
      <div class="col-lg-12 col-sm-12 col-md-6 px-1 py-1">
        <div class="card border-light shadow-sm">
          <div class="card-body">
            <form action="{{ route('admin.update') }}" method="POST">
              @csrf

              <div class="form-group row">
                <label for="name" class="col-2 col-form-label">Name</label>
                <div class="col-10">
                  <input type="text" name="name" id="name" class="form-control form-control-sm" value="{{ old('name') ?? Auth::user()->name }}">
                  <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                  <input type="email" name="email" id="email" class="form-control form-control-sm" value="{{ old('email') ?? Auth::user()->email }}">
                  <small class="text-danger">{{ $errors->first('email') }}</small>
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

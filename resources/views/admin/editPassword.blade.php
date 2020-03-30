{{-- Author : Andra Yuusha --}}

@extends('layouts.app')

@section('title', 'LPC | Change Password')

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
    <h1 class="h3 mb-5 text-gray-800"><a href="{{ route('admin.index') }}">Profile</a>/Edit Password</h1>
    <div class="row no-gutters">
      <div class="col-lg-12 col-sm-12 col-md-6 px-1 py-1">
        <div class="card border-light shadow-sm">
          <div class="card-body">
            <form action="{{ route('admin.postPassword') }}" method="POST">
              @csrf

              <div class="form-group row">
                <label for="oldPass" class="col-2 col-form-label">Old Password</label>
                <div class="col-10">
                  <input type="password" name="oldPass" id="oldPass" class="form-control form-control-sm">
                  <small class="text-danger">{{ $errors->first('oldPass') }}</small>
                </div>
              </div>

              <div class="form-group row">
                <label for="newPass" class="col-2 col-form-label">New Password</label>
                <div class="col-10">
                  <input type="password" name="newPass" id="newPass" class="form-control form-control-sm">
                  <small class="text-danger">{{ $errors->first('newPass') }}</small>
                </div>
              </div>

              <div class="form-group row">
                <label for="conPass" class="col-2 col-form-label">Confirm Password</label>
                <div class="col-10">
                  <input type="password" name="conPass" id="conPass" class="form-control form-control-sm">
                  <small class="text-danger">{{ $errors->first('conPass') }}</small>
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

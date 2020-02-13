{{-- Author : Andra Yuusha --}}

@extends('layouts.app')

@section('title', 'LPC | Login')
@section('bodyColor', '')

@section('content')
<div class="swal" data-title="{{ Session::get('title') }}" data-message="{{ Session::get('message') }}"></div>
<div class="row justify-content-center" style="margin-top:100px">
  <div class="col-lg-5 col-xs-12 col-md-8">
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="card-title h3 text-center text-muted" id="loginTitle">LOGIN</div>
        <form action="{{ url('/login') }}" method="POST">
          @csrf
          <div class="row justify-content-center">

            <div class="col-12">
              <div class="form-group">
                <label for="email" class="text-muted font-weight-light">Email</label>
                <input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="Your E-mail here">
                <small class="text-danger">{{ $errors->first('email') }}</small>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label for="password" class="text-muted font-weight-light">Password</label>
                <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="Type Your Password">
                <small class="text-danger">{{ $errors->first('password') }}</small>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <button type="submit" class="btn btn-success btn-block" id="btnLogin">Login</button>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
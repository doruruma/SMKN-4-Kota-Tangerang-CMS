{{-- Author : Andra Yuusha --}}

@extends('layouts.app')

@section('title', 'LPC | Profile')

@section('bodyClass', 'bg-light')

@section('plugin')
@endsection

@section('pageJS')
@endsection

@section('content')
  @include('layouts.sidebar')
  @include('layouts.nav')
  <div class="container mb-5" style="min-height:600px">
    <h1 class="h3 mb-3 text-gray-800">Profile</h1>
    <div class="row no-gutters">
      <div class="col-lg-12 col-sm-12 col-md-6 px-1 py-1">
        <div class="card border-light shadow-sm" style="min-height:350px">
          <div class="card-body">
            <div class="h4 text-muted mt-5">{{ Auth::user()->name }}</div>
            <div class="row">
              <div class="col-6">
                <div class="text-primary font-weight-bold" style="font-size:13px">{{ Auth::user()->email }}</div>
              </div>
            </div>
          </div>
          <div class="card-footer border-white bg-white">
            <a href="{{ route('admin.password') }}" class="btn btn-sm btn-link font-weight-bold">Change Password</a>
            <a href="{{ route('admin.edit') }}" class="btn btn-sm btn-link font-weight-bold">Edit Profile</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('layouts.footer')
@endsection
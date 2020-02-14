{{-- Author : Andra Yuusha --}}

@extends('layouts.app')

@section('title', 'LPC | Dashboard')
@section('bodyClass', 'bg-light')

@section('content')
  @include('layouts.sidebar')
  @include('layouts.nav')
    <div class="container">
      <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

      <div class="row mb-4">
        <div class="col-lg-5 col-md-6 col-sm-12">
          <div class="card shadow-sm border-light" style="min-height:220px;">
            <div class="card-body">

            </div>
          </div>
        </div>
        <div class="col-lg-7 col-md-6 col-sm-12">
          <div class="card shadow-sm border-light" style="min-height:220px;">
            <div class="card-body">

            </div>
          </div>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="card shadow-sm border-light" style="min-height:300px;">
            <div class="card-body">

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  @include('layouts.footer')
@endsection
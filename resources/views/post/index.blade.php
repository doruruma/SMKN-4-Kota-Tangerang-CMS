{{-- Author : Andra Yuusha --}}

@extends('layouts.app')

@section('title', 'LPC | Post')
@section('bodyClass', 'bg-light')
@section('plugin')
  <link rel="stylesheet" href="{{ asset('/vendor/datatables/dataTables.bootstrap4.min.css') }}">
  <script src="{{ asset('/vendor/datatables/jquery.dataTables.min.js') }}" defer></script>
  <script src="{{ asset('/vendor/datatables/dataTables.bootstrap4.min.js') }}" defer></script>
@endsection
@section('pageJS')
    <script src="{{ asset('/js/post.js') }}" defer></script>
@endsection

@section('content')
@include('layouts.sidebar')
@include('layouts.nav')
<div class="container-fluid" style="min-height:600px">
  <h1 class="h3 mb-3 text-gray-800">Posts List</h1>
  <div class="row no-gutters">
    <div class="col-lg-12 col-md-6 col-sm-12 px-1 py-1">
      <button class="btn btn-info btn-sm my-2">Add Posts</button>
      <div class="card shadow-sm border-light" style="min-height:200px;">
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
@include('layouts.footer')
@endsection
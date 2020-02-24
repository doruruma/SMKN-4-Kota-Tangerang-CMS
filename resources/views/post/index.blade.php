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
  <script src="{{ asset('/js/postIndex.js') }}" defer></script>
@endsection

@section('content')
  @include('layouts.sidebar')
  @include('layouts.nav')
  <div class="container mb-5" style="min-height:600px">
    <h1 class="h3 mb-3 text-gray-800">Post List</h1>
    <div class="row no-gutters">
      <a href="{{ url('/admin/post/new') }}" class="btn btn-sm ml-auto mx-1 btn-primary my-2">Add Posts</a>
      <div class="col-lg-12 col-md-6 col-sm-12 px-1 py-1">
        <div class="card shadow-sm border-light">
          <div class="card-body">
            <table class="table">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @php $no = 0; @endphp
                @foreach ($posts as $post)
                <tr>
                  <td>{{ ++$no }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->category->category }}</td>
                  <td>{{ $post->created_at }}</td>
                  <td>{{ $post->published == 1 ? "Published" : "Draft" }}</td>
                  <td>
                    <a href="/admin/post/delete/{{ $post->id }}" onclick="return confirm('Remove this post?')">Remove</a> <a href="/admin/post/{{ $post->id }}">Edit</a>
                  </td>
                </tr>
                @endforeach
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('layouts.footer')
@endsection  
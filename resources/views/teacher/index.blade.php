{{-- Author : Andra Yuusha --}}

@extends('layouts.app')

@section('title', 'LPC | Teacher')

@section('bodyClass', 'bg-light')

@section('plugin')
  <link rel="stylesheet" href="{{ asset('/vendor/datatables/dataTables.bootstrap4.min.css') }}">
  <script src="{{ asset('/vendor/datatables/jquery.dataTables.min.js') }}" defer></script>
  <script src="{{ asset('/vendor/datatables/dataTables.bootstrap4.min.js') }}" defer></script>
@endsection

@section('script')
  <script>
    $(document).ready(function() {
      $('.teacher').addClass('active')
      $('.table').DataTable()
    })
  </script>
@endsection

@section('content')
  @include('layouts.sidebar')
  @include('layouts.nav')
  <div class="container mb-5" style="min-height:600px">
    <h1 class="h3 mb-3 text-gray-800">Teacher List</h1>
    <div class="row no-gutters">
      <a href="{{ route('teacher.add') }}" class="btn btn-sm ml-auto mx-1 btn-primary my-2">Add Teacher</a>
      <div class="col-lg-12 col-md-6 col-sm-12 px-1 py-1">
        <div class="card shadow-sm border-light">
          <div class="card-body">
            <table class="table">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Subject</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @php $no = 0; @endphp
                @foreach ($teacher as $teachers)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$teachers->name}}</td>
                  <td>{{$teachers->subject}}</td>
                  <td>
                    <a href="/admin/teacher/delete/{{ $post->id }}" onclick="return confirm('Remove this post?')">Remove</a> <a href="/admin/teacher/{{ $post->id }}">Edit</a>
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
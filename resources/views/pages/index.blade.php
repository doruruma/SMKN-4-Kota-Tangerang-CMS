{{-- Author : Andra Yuusha --}}

@extends('layouts.app')

@section('title', 'LPC | Page')

@section('bodyClass', 'bg-light')

@section('plugin')
  <link rel="stylesheet" href="{{ asset('/vendor/datatables/dataTables.bootstrap4.min.css') }}">
  <script src="{{ asset('/vendor/datatables/jquery.dataTables.min.js') }}" defer></script>
  <script src="{{ asset('/vendor/datatables/dataTables.bootstrap4.min.js') }}" defer></script>
@endsection

@section('pageJS')
  <script src="{{ asset('/js/pageIndex.js') }}" defer></script>
@endsection

@section('script')
<script>
  $(document).ready(function () {
    $('.page').addClass('active')
    $('.table').DataTable()
  })
</script>
@endsection


@section('content')
  @include('layouts.sidebar')
  @include('layouts.nav')
  <div class="container" style="min-height:600px">
    <h1 class="h3 mb-3 text-gray-800">Pages List</h1>
    <div class="row no-gutters">
      <a href="{{ route('page.new') }}" class="btn btn-sm ml-auto mx-1 btn-primary my-2">Add Pages</a>
      <div class="col-lg-12 col-md-6 col-sm-12 px-1 py-1">
        <div class="card shadow-sm border-light">
          <div class="card-body">
            <table class="table">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @php $no = 0; @endphp
                @foreach ($pages as $page)
                <tr>
                  <td>{{++$no}}</td>
                  <td>{{ $page->title }}</td>
                  <td>{{ $page->created_at }}</td>
                  <td>{{ $page->published == 1 ? "Published" : "Draft" }}</td>
                  <td>
                    <a href="{{ route('page.delete', ['id' => $page->id]) }}" onclick="return confirm('Remove this page?')">Remove</a> <a href="{{ route('page.edit', ['id' => $page->id]) }}">Edit</a>
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

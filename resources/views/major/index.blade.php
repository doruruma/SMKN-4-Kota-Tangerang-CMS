{{-- Author : Andra Yuusha --}}

@extends('layouts.app')

@section('title', 'LPC | Major List')

@section('bodyClass', 'bg-light')

@section('plugin')
  <link rel="stylesheet" href="{{ asset('/vendor/datatables/dataTables.bootstrap4.min.css') }}">
  <script src="{{ asset('/vendor/datatables/jquery.dataTables.min.js') }}" defer></script>
  <script src="{{ asset('/vendor/datatables/dataTables.bootstrap4.min.js') }}" defer></script>
@endsection

@section('pageJS')
  <script src="{{ asset('/js/majorIndex.js') }}" defer></script>
@endsection

@section('content')
  @include('layouts.sidebar')
  @include('layouts.nav')
  <div class="container mb-5" style="min-height:600px">
    <h1 class="h3 mb-3 text-gray-800">Major List</h1>
    <div class="row no-gutters">
      <a href="{{ route('major.create') }}" class="btn btn-sm ml-auto mx-1 btn-primary my-2">Add Major</a>
      <div class="col-lg-12 col-md-6 col-sm-12 px-1 py-1">
        <div class="card shadow-sm border-light">
          <div class="card-body">
            <table class="table">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @php
                    $no = 0;
                @endphp
                @foreach ($major as $item)
                @php
                    $no++
                @endphp
                <tr>
                  <td>{{$no}}</td>
                  <td>{{$item->name}}</td>
                  <td><img src="{{asset('majors/'.$item->image)}}" alt="" class="img-fluid" style="height: 20vh"></td>
                  <td>
                    <form action="{{route('major.destroy', $item->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <a href="{{route('major.edit', $item->id)}}" class="btn btn-info">Edit</a>
                      <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
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

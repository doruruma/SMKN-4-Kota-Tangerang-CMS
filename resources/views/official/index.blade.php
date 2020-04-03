{{-- Author : Andra Yuusha --}}

@extends('layouts.app')

@section('title', 'LPC | Official List')

@section('bodyClass', 'bg-light')

@section('plugin')
  <link rel="stylesheet" href="{{ asset('/vendor/datatables/dataTables.bootstrap4.min.css') }}">
  <script src="{{ asset('/vendor/datatables/jquery.dataTables.min.js') }}" defer></script>
  <script src="{{ asset('/vendor/datatables/dataTables.bootstrap4.min.js') }}" defer></script>
@endsection

@section('script')
  <script>
    $(document).ready(function(){
      $('.official').addClass('active')
      $('.table').DataTable()
      $('.btnDelete').click(function(){
        Swal.fire({
          title: 'Konfirmasi Hapus',
          text: 'Yakin Hapus Data?',
          icon: 'warning',
          showCancelButton: true
        }).then((res) => {
          res.value ? $(this).parent().submit() : false
        })
      })
    })
  </script>
@endsection

@section('content')
  @include('layouts.sidebar')
  @include('layouts.nav')
  <div class="container mb-5" style="min-height:600px">
    <h1 class="h3 mb-3 text-gray-800">Official List</h1>
    <div class="row no-gutters">
      <a href="{{ route('official.create') }}" class="btn btn-sm ml-auto mx-1 btn-primary my-2">Add Official</a>
      <div class="col-lg-12 col-md-6 col-sm-12 px-1 py-1">
        <div class="card shadow-sm border-light">
          <div class="card-body">
            <table class="table">

              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Position</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @php $i = 1 @endphp
                @foreach ($official as $item)
                @php
                    $i++
                @endphp
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->position->position }}</td>
                  <td>
                    <a href="{{route('official.edit', $item->id)}}" class="btn btn-sm btn-default py-1"><i class="fas fa-pen text-info"></i></a>
                    <form action="{{route('official.delete', $item->id)}}" method="POST" class="d-inline py-1">
                      @csrf @method('DELETE')
                      <button class="btn btn-default btn-sm btnDelete"><i class="fas fa-trash text-danger"></i></button>
                    </form>
                  </td>
                </tr>
                @php $i++ @endphp
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
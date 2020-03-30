{{-- Author : Andra Yuusha --}}

@extends('layouts.app')

@section('title', 'LPC | Post')

@section('bodyClass', 'bg-light')

@section('plugin')
  <link rel="stylesheet" href="{{ asset('/vendor/datatables/dataTables.bootstrap4.min.css') }}">
  <script src="{{ asset('/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
@endsection

@section('script')
<script>
  $(document).ready(function () {

    $('.post').addClass('active')
    $('.table').DataTable()

    $('.btnDelete').click(function (e) {
      e.preventDefault()
      Swal.fire({
        title: 'Konfirmasi Hapus',
        text: 'Yakin Hapus Post?',
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
                  <th class="text-center">Action</th>
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
                  <td class="text-center">
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm"><i class="fas fa-pen text-info"></i></button>
                    <form action="{{ route('post.delete', $post->id) }}" method="POST" class="d-inline">
                      @csrf @method('DELETE')
                      <button class="btn btn-sm btnDelete"><i class="fas fa-trash text-danger"></i></button>
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
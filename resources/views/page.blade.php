@extends('welcome')

@section('content')


    <div class="container mt-4" style="min-height: 100vh">
        {!! $page->content !!}
    </div>

@endsection

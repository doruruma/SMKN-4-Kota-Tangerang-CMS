@extends('welcome')

@section('content')

    <div class="container mt-5" style="min-height: 100vh">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h3 class="font-weight-bold mb-4 bold">{{ $major->name }}</h3>
                <div class="text-center">
                    <img src="{{ asset('/majors/'.$major->image) }}" alt="" class="img-fluid mb-3 rounded">
                </div>

                <div class="content" style="overflow: hidden;">
                    {!! $major->description !!}
                </div>
            </div>
        </div>
    </div>

@endsection

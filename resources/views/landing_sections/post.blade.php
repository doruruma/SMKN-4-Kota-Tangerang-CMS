@extends('welcome')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm py-4 px-4 mb-2">
                    <h5 class="font-weight-bold">{{ $post->title }}</h5>
                    <small class="text-muted d-block mb-2">Posted by {{ $post->user->name }}</small>
                    <img src="{{ asset('/thumbnail_posts/'.$post->thumbnail) }}" alt="" class="img-fluid d-block mb-3">
                    <div class="open-sans">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm py-4 px-4">
                    <h5 class="font-weight-bold">Recent {{ $category->category }}</h5>
                    @foreach($category->posts as $post)
                        <a href="{{ URL::to('/'.$category->slug.'/'.$post->slug) }}">
                            <div class="row mb-3">
                                <div class="col-md-5">
                                    <img src="{{ asset('/thumbnail_posts/'.$post->thumbnail) }}" alt="" class="img-fluid d-block" >
                                </div>
                                <div class="col-md-7 text-dark text-decoration-none">
                                    <span class="font-weight-bold" style="font-size: 12px;">{{ $post->title }}</span>
                                    <small class="text-muted d-block" style="font-size : 10px">Posted by {{ $post->user->name }}</small>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection

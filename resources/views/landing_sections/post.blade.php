@extends('welcome')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-8">
                <div class="card border-0 shadow-lg py-5 px-5 mb-2">
                    <h5 class="font-weight-bold">{{ $post->title }}</h5>
                    <small class="text-muted d-block mb-4">Posted by {{ $post->user->name }}</small>
                    <img src="{{ asset('/thumbnail_posts/'.$post->thumbnail) }}" alt="" class="img-fluid d-block mb-4"  style="max-width: 550px; max-height:300px;">
                    <div class="content">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card border-0 shadow py-5 px-5">
                    <h5 class="font-weight-bold mb-4">Recent {{ $category->category }}</h5>
                    @foreach($category->posts()->orderBy('created_at')->get() as $postCategory)
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <img src="{{ asset('/thumbnail_posts/'.$postCategory->thumbnail) }}" alt="" class="img-fluid d-block"  style="width: 100px; height:67px;">
                            </div>
                            <div class="col-sm-7">
                                <a href="{{ URL::to('/'.$category->slug.'/'.$postCategory->slug) }}" class="text-decoration-none text-dark">
                                    <span class="font-weight-bold" style="font-size: 12px;">{{ $postCategory->title }}</span>
                                    <small class="text-muted d-block" style="font-size : 10px">Posted by {{ $postCategory->user->name }}</small>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

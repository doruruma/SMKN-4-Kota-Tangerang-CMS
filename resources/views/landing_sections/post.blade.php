@extends('welcome')

@section('content')
    <div class="container mt-5">
        <style scoped>
            .l- {
                height:390px !important;
                width:100%;
            }

            .l-s {
                width:100%;
                height:100% !important;
            }

            @media screen and (max-width:1024px) {
                .l- {
                    height:200px !important;
                    width: 100%;
                }

                .l-s {
                    height:200px !important;
                    width: 100%;
                }
            }
        </style>
        <div class="row">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm py-4 px-4 mb-2">
                    <h5 class="font-weight-bold">{{ $post->title }}</h5>
                    <small class="text-muted d-block mb-2">Posted by {{ $post->user->name }}</small>
                    <img src="{{ asset('/thumbnail_posts/'.$post->thumbnail) }}" alt="" class="d-block mb-3 l-" style="height:400px;width:100%">
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
                                    <img src="{{ asset('/thumbnail_posts/'.$post->thumbnail) }}" alt="" class="d-block l-s" >
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

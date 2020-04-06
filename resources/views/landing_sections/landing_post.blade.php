@extends('welcome')


@section('content')

    <div class="container mt-5 mb-5" style="overflow:hidden">
        <h3 class="mb-3"><b>Latest Post</b></h3>
        <style scoped>
            .l- {
                height:390px !important;
                width:100%;
            }

            .l-s {
                width:100% !important;
                height:100px !important;
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
        {{-- Latest Post Side --}}
        <div class="row mb-5">
            <div class="col-lg-7 px-2">
                <div class="card border-0 mb-3 shadow-sm">
                    @foreach ($single as $item)
                    <a href="{{ URL::to('/'.$item->category->category.'/'.$item->slug) }}" class="text-decoration-none text-dark">
                    <div class="card-body">
                        <img src="{{URL::to('/thumbnail_posts/'.$item->thumbnail)}}" alt="" class="mt-4 mb-4 l-">
                            <h4 style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; display:block; ">
                                <b>
                                    {{$item->title}}
                                </b>
                            </h4>
                            <small>
                                    {{$item->user->name}}
                            </small>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-5 px-2" style="overflow:hidden">
                @foreach ($latest as $item)
                <a href="{{ URL::to('/'.$item->category->slug.'/'.$item->slug) }}" class="text-decoration-none text-dark">
                <div class="card mb-3 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-4 ">
                            <img src="{{URL::to('/thumbnail_posts/'.$item->thumbnail)}}" alt="" class="l-s" >
                        </div>
                        <div class="col-md-8">
                            <h4>
                                <b>
                                    {{$item->title}}
                                </b>
                            </h4>
                            <small>
                                    {{$item->user->name}}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
                </a>
                @endforeach
        </div>


    {{-- Recent Side --}}
    <h3 class="mb-3"><b>{{$title}}</b></h3>
    <div class="row">
        @foreach ($post as $item)
        <div class="col-sm-4">
            <a href="{{ URL::to('/'.$item->category->category.'/'.$item->slug) }}" class="text-decoration-none text-dark">
                <div class="card mb-3 mt-3 border-0 shadow-sm">
                    <div class="card-body">
                        <img src="{{URL::to('/thumbnail_posts/'.$item->thumbnail)}}" alt="" style="width:100%;height:250px;" class="mt-4 mb-4">
                        <h4>
                            <b>
                                {{$item->title}}
                            </b>
                        </h4>
                        <small>
                                {{$item->user->name}}
                        </small>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
</div>
@endsection



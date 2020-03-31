@extends('welcome')


@section('content')

    <div class="container mt-5 mb-5">
        <h3 class="mb-3"><b>Latest Post</b></h3>

        {{-- Latest Post Side --}}
        <div class="row mb-5">
            <div class="col-lg-7 px-2">
                <div class="card border-0 mb-3 shadow">
                    @foreach ($single as $item)
                    <a href="#" class="text-decoration-none text-dark">
                    <div class="card-body">
                        <img src="{{URL::to('/thumbnail_posts/'.$item->thumbnail)}}" alt="" style="max-width:100%; max-height:100%; " class="mt-4 mb-4 ">
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
                <div class="card mb-3 border-0 shadow">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-4 ">
                            <img src="{{URL::to('/thumbnail_posts/'.$item->thumbnail)}}" alt="" style="max-width:100%; max-height:100%;" >
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
        </div>


    {{-- Recent Side --}}
    <h3 class="mb-3"><b>{{$title}}</b></h3>
    <div class="row">
        @foreach ($post as $item)
        <div class="col-sm-4">
            <div class="card mb-3 mt-3 border-0 shadow">
                <div class="card-body">
                    <img src="{{URL::to('/thumbnail_posts/'.$item->thumbnail)}}" alt="" style="max-width:100%; max-height:100%; " class="mt-4 mb-4">
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
        @endforeach
    </div>
</div>
@endsection



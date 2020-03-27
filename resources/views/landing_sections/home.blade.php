@extends('welcome')

@section('content')

    <div class="container mt-5" style="height: 100vh">
        <div class="row">
            <div class="col-sm-8">
                <div id="carouselExampleControls" class="carousel slide" style="overflow: hidden; max-height:400px" data-ride="carousel">

                        @php $counter = 0; @endphp
                        @foreach($news as $new):

                            <div class="carousel-item {{ !$counter ? "active" : "" }}" style="max-width:100%;">
                                <img src="{{ URL::to('/thumbnail_posts/'.$new->thumbnail) }}" class="d-block w-100" style=" max-height:350px">
                                <div class="isi">
                                    <div class="row" style="height:50px;">
                                        <div class="col my-auto ml-3">
                                            <a class="my-auto text-white" href="{{ URL::to('/news/'.$new->slug) }}"><h5>{{ $new->title }}</h5></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @php $counter++; @endphp

                        @endforeach
                    <div style="position: absolute; margin-left: 20px;">
                        <a class="" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <h5 class="bold mb-0">RECENT EVENTS</h5>
                <div style="height:5px; width: 50px; background-color:yellow;" class="mb-3"></div>
                @foreach($events as $event)
                    <div class="card border-0 bg-white shadow-sm mb-2">
                        <div class="card-body p-0 pr-3">
                            <a href="{{ URL::to('/news/'.$event->slug) }}">
                                <div class="row">
                                    <div class="col-4 pr-0 my-auto" style="overflow: hidden">
                                        <img src="{{ URL::to('/thumbnail_posts/'.$event->thumbnail) }}" alt="" style="width:100%">
                                    </div>
                                    <div class="col-8 my-auto">
                                        <h6 class="text-dark">{{ $event->title }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

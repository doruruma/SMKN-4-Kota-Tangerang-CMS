@extends('welcome')

@section('content')

    <div class="container" style="min-height: 200vh;">
        <div id="landing" class="white-space">
            <div class="row">
                <div class="col-sm-8">
                    <div id="carouselExampleControls" class="carousel slide" style="overflow: hidden; max-height:400px" data-ride="carousel">

                            @php $counter = 0; @endphp
                            @foreach($news as $new):

                                <div class="carousel-item {{ !$counter ? "active" : "" }}" style="max-width:100%;">
                                    <img src="{{ URL::to('/thumbnail_posts/'.$new->thumbnail) }}" class="d-block w-100" style=" max-height:400px">
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
                    <div class="row">
                        <div class="col-8">
                            <h5 class="bold mb-1">RECENT EVENTS</h5>
                        </div>
                        <div class="col">
                            <a href="/events" class="text-secondary float-right">more</a>
                        </div>
                    </div>
                    <div style="height:5px; width: 50px; background-color:yellow;" class="mb-3"></div>
                    @foreach($events as $event)
                        <div class="card border-0 bg-white shadow-sm mb-2">
                            <div class="card-body p-0 pr-3">
                                <a href="{{ URL::to('/news/'.$event->slug) }}">
                                    <div class="row">
                                        <div class="col-4 pr-0" style="overflow: hidden">
                                            <img src="{{ URL::to('/thumbnail_posts/'.$event->thumbnail) }}" alt="" style="width:100%;height:81px;">
                                        </div>
                                        <div class="col-8 my-auto">
                                            <small class="text-dark open-sans" style="">{{ $event->title }}</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div id="jurusan" class="mt-5">
            <div class="text-center">
                <h5 class="bold">PRODI JURUSAN</h5>
                <div style="height:5px; width: 50px; background-color:yellow;" class="m-auto"></div>
            </div>
            <div id="carouselJurusan" class="carousel slide" data-ride="carousel">
                <div class="row mt-5">
                    <div class="col-1 my-auto">
                        <a class="carousel-control-prev-icon bg-secondary float-left" href="#carouselJurusan" data-slide="prev" aria-hidden="true"></a>
                    </div>
                    <div class="col-10" style="overflow-x: hidden">
                        @php $counter = 0; @endphp
                        @foreach($majors as $major)
                            <div class="carousel-item {{ !$counter++ ? "active" : "" }}">
                                <div class="card shadow-sm border-0">
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12 col-sm-12">
                                                <div style="min-height:450px; max-height:450px; background:url({{ URL::to('/majors/'.$major->image) }});background-size:cover"></div>
                                            </div>
                                            <div class="col-lg-8 col-md-12 col-sm-12 my-auto pl-4 pr-5">
                                                <h3 class="bold">{{ $major->name }}</h3>
                                                <p style="text-overflow:ellipsis; overflow:hidden;">{!!$major->description!!}</p>
                                                <div class="form-group">
                                                    <a href="" class="btn" style="background-color: #1E54BF;color:white; width: 100px;">More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-1 my-auto">
                        <a class="carousel-control-next-icon bg-secondary float-right" aria-hidden="true"  href="#carouselJurusan" data-slide="next"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

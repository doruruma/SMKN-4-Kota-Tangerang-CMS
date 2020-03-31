@extends('welcome')

@section('content')

    <div class="container" style="min-height: 100vh;">
        <div id="landing" class="mt-lg-5 mt-sm-3 mt-md-3 mt-3 mb-5">
            <div class="row">
                @if(count($news) > 0)
                    <div class="col-md-12 mt-3 col-lg-8 col-sm-12">
                        <div id="carouselExampleControls" class="carousel slide" style="overflow: hidden; max-height:400px" data-interval="false" data-ride="carousel">
                            @php $counter = 0; @endphp
                            @foreach($news as $new):

                                <div class="carousel-item {{ !$counter ? "active" : "" }}" style="max-width:100%;">
                                    <img src="{{ URL::to('/thumbnail_posts/'.$new->thumbnail) }}" class="w-100 image-fix">
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
                @endif
                @if(count($events) > 0)
                    <div class="col-md-12 col-sm-12 col-lg-4 mt-3 {{ count($news) == 0 ? "offset-sm-8" : "" }}">
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
                @endif
            </div>
        </div>

        @if(count($majors) > 0)
            <div id="jurusan" class="mt-5 mb-5">
                <div class="text-center">
                    <h5 class="bold">PRODI JURUSAN</h5>
                    <div style="height:5px; width: 50px; background-color:yellow;" class="m-auto"></div>
                </div>
                <div id="carouselJurusan" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="row mt-5">
                        <div class="col-1 d-none d-lg-block my-auto">
                            <a class="carousel-control-prev-icon bg-secondary float-left" href="#carouselJurusan" data-slide="prev" aria-hidden="true"></a>
                        </div>
                        <div class="col-12 p-sm-5 p-md-5 p-xs-5 col-lg-10 carousel-inner" style="overflow-x: hidden">
                            @php $counter = 0; @endphp
                            @foreach($majors as $major)
                                <div class="carousel-item {{ !$counter++ ? "active" : "" }}">
                                    <div class="card shadow-sm border-0">
                                        <div class="card-body p-0">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                    <div class="image-major-fix w-100" style="background:url({{ URL::to('/majors/'.$major->image) }});background-size:cover"></div>
                                                </div>
                                                <div class="col-lg-8 col-md-12 col-sm-12 my-lg-auto px-5 px-lg-4 mt-lg-0 mb-5 mb-lg-0 mt-5">
                                                    <h3 class="bold">{{ $major->name }}</h3>
                                                    <p style="text-overflow:ellipsis; overflow:hidden; width: 18px;">{!!$major->description!!}</p>
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
                        <div class="col-1 d-none d-lg-block my-auto">
                            <a class="carousel-control-next-icon bg-secondary float-right" aria-hidden="true"  href="#carouselJurusan" data-slide="next"></a>
                        </div>
                    </div>

                </div>
            </div>
        @endif

        @if(count($officials) > 0)
            <div id="officials" class="mt-5 mb-5">
                <div class="text-center mb-5">
                    <h5 class="bold">STAFF</h5>
                    <div style="height:5px; width: 50px; background-color:yellow;" class="m-auto"></div>
                </div>

                <div class="owl-carousel row">
                    <div></div>
                </div>
            </div>
        @endif

        @if(count($prestasi) > 0)
            <div id="prestasi" class="mt-5 mb-5">

            </div>
        @endif

        <div id="gmaps" class="mt-5" style="margin-bottom:100px;">
            <div class="text-center mb-5">
                <h5 class="bold">LOKASI SEKOLAH</h5>
                <div style="height:5px; width: 50px; background-color:yellow;" class="m-auto"></div>
            </div>
            <div class="row no-gutters">
                <div class="col">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15866.30757025075!2d106.6377526!3d-6.1873334!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbbf35137362e584d!2sSekolah%20Menengah%20Kejuruan%20Negeri%204%20Tangerang!5e0!3m2!1sid!2sid!4v1585557646148!5m2!1sid!2sid" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>



@endsection

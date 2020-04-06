@extends('welcome')

@section('content')

    <div class="container" style="min-height: 100vh;">
        <div id="landing" class="mt-lg-5 mt-sm-3 mt-md-3 mt-3 mb-5">
            <div class="row">
                @if(count($news) > 0)
                    <div class="col-md-12 mt-3 col-lg-8 col-sm-12">
                        <div id="carouselExampleControls" class="carousel slide br-s" style="overflow:hidden" data-interval="false" data-ride="carousel">
                            @php $counter = 0; @endphp
                            @foreach($news as $new):

                                <div class="carousel-item {{ !$counter ? "active" : "" }}" style="max-width:100%;">
                                    <img src="{{ URL::to('/thumbnail_posts/'.$new->thumbnail) }}" class="image-fix">
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
                        <div class="row mt-2 my-lg-2">
                            <div class="col-8">
                                <h5 class="bold">RECENT EVENTS</h5>
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
            @if(count($prestasi) > 0)
                <div id="prestasi" class="mt-5 mb-5">
                    <div class="text-center">
                        <h5 class="bold">PRESTASI</h5>
                        <div style="height:5px; width: 50px; background-color:yellow;" class="m-auto"></div>
                    </div>
                    <div class="row mt-5 flex-nowrap overflow-show">
                        @php $angka = 0 @endphp
                        @foreach($prestasi as $prestas)
                            <div class="col-lg-3 col-6 {{ !$angka++ ? "" : "pl-0" }}">
                                <a href="{{ URL::to('/'.$prestas->category->slug.'/'.$prestas->slug) }}" class="text-dark card-s">
                                    <div class="card text-center border-0 shadow-sm">
                                        <img class="card-img-top image-prestasi-fix" src="/thumbnail_posts/{{ $prestas->thumbnail }}">
                                        <div class="card-body open-sans">
                                            <span class="bold bulet-2">{{ $prestas->title }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        @if(count($majors) > 0)
            <div id="jurusan" class="mt-5 mb-5">
                <div class="text-center">
                    <h5 class="bold">PRODI JURUSAN</h5>
                    <div style="height:5px; width: 50px; background-color:yellow;" class="m-auto"></div>
                </div>
                <div id="carouselJurusan" style="overflow:hidden;" class="carousel slide mt-5" data-ride="carousel" data-interval="false">
                    <div class="row">
                        <div class="col-1 d-none d-lg-block my-auto">
                            <a class="carousel-control-prev-icon bg-secondary float-left" href="#carouselJurusan" data-slide="prev" aria-hidden="true"></a>
                        </div>
                        <div class="col-12 p-sm-5 p-md-5 p-lg-0 p-xs-5 col-lg-10 carousel-inner" style="overflow-x: hidden">
                            @php $counter = 0; @endphp
                            @foreach($majors as $major)
                                <div class="carousel-item {{ !$counter++ ? "active" : "" }}">
                                    <div class="card shadow-sm border-0">
                                        <div class="card-body p-0 pr-lg-4">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                    <div class="image-major-fix w-100" style="background:url({{ URL::to('/majors/'.$major->image) }});background-size:cover"></div>
                                                </div>
                                                <div class="col-lg-8 col-md-12 col-sm-12 my-lg-auto px-5 px-lg-4 mt-lg-0 mb-5 mb-lg-0 mt-5">
                                                    <h3 class="bold">{{ $major->name }}</h3>
                                                    <div class="bulet mb-3">{!!$major->description!!}</div>
                                                    <div class="form-group">
                                                        <a href="{{ URL::to('/major/'.$major->id) }}" class="btn" style="background-color: #1E54BF;color:white; width: 100px;">More</a>
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
                    <h5 class="bold">OUR TEAM</h5>
                    <div style="height:5px; width: 50px; background-color:yellow;" class="m-auto"></div>
                </div>

                <div class="owl-carousel">
                    @foreach($officials as $official)
                        <div class="rounded-circle m-auto image-official-fix item-c" style="background-image:url({{ URL::to('/officials/'.$official->image) }});background-size:cover;display:flex;align-items:center;justify-content:center;text-align:center">
                            <div style="z-index: 100" class="d-none">
                                <p class="text-white" style="z-index:100">{{ $official->name }}</p>
                                <small class="text-white" style="z-index: 100">{{ $official->position->position }}</small>
                            </div>
                            <div class="image-official-fix m-auto d-none" style="position:absolute;background-color:rgba(30,84,191,0.36);top:0;bottom:0;left:0;right:0;border-radius:50%;z-index:80">
                            </div>
                        </div>
                    @endforeach
                </div>
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

    <script>
        $(document).ready(() => {
            let get = $(".bulet")
            let get2 = $(".bulet-2")

            $('.owl-carousel').owlCarousel({
                loop: false,
                responsiveClass: true,
                nav: false,
                margin: 10,
                responsive: {
                    0: {
                        items: 2,
                    },
                    100: {
                        items: 2,
                    },
                    1000: {
                        items: 4,
                    }
                }
            })

            $.each(get, function(index, value) {
                let string = $(value).html()
                string = string.toString()
                string = string.replace( /(<([^>]+)>)/ig, '')
                let res = string.substring(0, 100)
                $(value).html(res + "...")
            })

            $.each(get2, function(index, value) {
                let string = $(value).html()
                string = string.toString()
                let res = string.substring(0, 25)
                if(string.length > 25) {
                    $(value).html(res + "..")
                } else {
                    $(value).html(string)
                }
            })
        })
    </script>

@endsection

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color:#1E54BF;height:80px;z-index:100">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img width="190" src="{{ asset('/img/logo-header.png') }}" alt="">
        </a>
        <button class="navbar-toggler d-md-none d-none d-sm-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-md-none d-none d-sm-none d-lg-block" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ml-3">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                @foreach($categories as $category)
                    <li class="nav-item ml-3">
                        <a href="/{{ $category->slug }}" class="nav-link">{{ $category->category }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

@if(count($pages) > 0)

    <nav class="navbar navbar-expand navbar-dark text-nowrap overflow-show" style="height:50px;background-color:#1C4FB3;overflow-x:hidden; overflow-y:hidden">
        <div class="container">
            <ul class="navbar-nav mr-auto">
                @foreach($pages as $page)
                    <li class="nav-item">
                        <a href="/{{ $page->slug }}" class="nav-link">{{$page->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>
@endif
<div class="w-100" style="height:5px;background-color:#EFFF0A;z-index:200;"></div>

<div id="footer-nav" class="fixed-bottom navbar-expand text-center navbar pb-0 bg-white border navbar-light d-md-block d-lg-none d-sm-block d-xs-block">
    <div class="navbar-nav m-auto my-auto">
        <div class="nav-item my-auto">
            <a href="{{ URL::to('/') }}" class="nav-link text-center"><span class='fa fa-home d-block'></span> Home</a>
        </div>
        <div class="nav-item my-auto">
            <a href="{{ URL::to('/news') }}" class="nav-link text-center"><span class='fa fa-newspaper d-block'></span> News</a>
        </div>
        <div class="nav-item my-auto">
            <a href="{{ URL::to('/prestasi') }}" class="nav-link text-center"><span class='fa fa-trophy d-block'></span> Prestasi</a>
        </div>
        <div class="nav-item my-auto">
            <a href="{{ URL::to('/articles') }}" class="nav-link text-center"><span class='fa fa-file-alt d-block'></span> Articles</a>
        </div>
        <div class="nav-item my-auto">
            <a href="{{ URL::to('/events') }}" class="nav-link text-center"><span class='fa fa-calendar-alt d-block'></span> Events</a>
        </div>
    </div>
</div>

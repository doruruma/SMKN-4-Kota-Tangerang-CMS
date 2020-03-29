@extends('welcome')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-8">
                <div class="card border-0 shadow-lg py-5 px-5 mb-2">
                    <h5 class="font-weight-bold">Jelang Pengumuman Kelulusan. SMKN 4 tumben ga tawuran</h5>
                    <small class="text-muted d-block mb-2">Posted by Admin SMKN 4</small>
                    <img src="{{ asset('/img/lomba.jpeg') }}" alt="" class="img-fluid d-block mb-3"  style="max-width: 550px; max-height:300px;">
                    <span style="font-size : 13px;">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum obcaecati quae, perferendis delectus voluptatum similique amet. Quam odit ratione libero, vitae iusto, minus rerum corporis ea distinctio impedit quidem velit. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Architecto fugiat in similique doloribus modi vitae minima, repellendus officiis sint provident, voluptatibus tempore perspiciatis eius dignissimos dolorum distinctio, voluptate animi! Nisi? Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> <br> A neque sed provident ex sunt. Commodi iusto reprehenderit pariatur harum nemo voluptates. Dolores quod perspiciatis totam rerum magnam obcaecati iure dolorum? Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque doloremque accusamus explicabo molestias corporis quo itaque cupiditate deserunt architecto dolore molestiae modi earum est eligendi, iusto soluta. Repudiandae, veritatis a.
                    </span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card border-0 shadow-lg py-5 px-5">
                    <h5 class="font-weight-bold">Recent Articles</h5>
                <div class="row mb-3">
                    <div class="col-sm-5">
                        <img src="{{ asset('/img/lomba.jpeg') }}" alt="" class="img-fluid d-block"  style="width: 100px; height:67px;">
                    </div>
                    <div class="col-sm-7">
                        <a href="" class="text-decoration-none text-dark">
                            <span class="font-weight-bold" style="font-size: 12px;">Kegiatan Perjumsa</span>
                            <small class="text-muted d-block" style="font-size : 10px">Posted by Admin SMKN 4</small>
                        </a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-5">
                        <img src="{{ asset('/img/lomba.jpeg') }}" alt="" class="img-fluid d-block"  style="width: 100px; height:67px;">
                    </div>
                    <div class="col-sm-7">
                        <a href="" class="text-decoration-none text-dark">
                            <span class="font-weight-bold" style="font-size: 12px;">Ekstrakurikuler Multimedia</span>
                            <small class="text-muted d-block" style="font-size : 10px">Posted by Admin SMKN 4</small>
                        </a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-5">
                        <img src="{{ asset('/img/lomba.jpeg') }}" alt="" class="img-fluid d-block"  style="width: 100px; height:67px;">
                    </div>
                    <div class="col-sm-7">
                        <a href="" class="text-decoration-none text-dark">
                            <span class="font-weight-bold" style="font-size: 12px;">SMKN 4 tidak tawuran</span>
                            <small class="text-muted d-block" style="font-size : 10px">Posted by Admin SMKN 4</small>
                        </a>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@extends('customer.layout')

@section('title')
    Index
@endsection

@section('content')
    <section
            style="background: url({{asset('images/customer/sample/coverblock.jpg')}}) center top no-repeat; background-size: cover;"
            class="bar no-mb color-white text-center bg-fixed relative-positioned">
        <div class="dark-mask"></div>
        <div class="container">
            <div class="icon icon-outlined icon-lg"><i class="fa fa-search"></i></div>
            <h1>Block with fixed image background and icon</h1>
            <div class="lead mb-0" style="max-width: 60%; margin:0 auto;">
                <form>
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-secondary "><i class="fa fa-send"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="bg-white bar">
        <div class="container">
            <div class="heading text-center">
                <h2>4 Langkah Penggunaan</h2>
            </div>
            <p class="lead"></p>
            <div class="row d-flex align-items-stretch same-height">
                <div class="col-md-3">
                    <div class="box-simple box-white same-height">
                        <div class="icon"><i class="fa fa-desktop"></i></div>
                        <h4>Daftar</h4>
                        <p>Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved
                            fowl Moved life us beast good yielding. Have bring.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-simple box-white same-height">
                        <div class="icon"><i class="fa fa-print"></i></div>
                        <h4>Pilih</h4>
                        <p>Advantage old had otherwise sincerity dependent additions. It in adapted natural hastily is
                            justice. Six draw you him full not mean evil. Prepare garrets it expense windows shewing
                            do.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-simple box-white same-height">
                        <div class="icon"><i class="fa fa-globe"></i></div>
                        <h4>Pesan</h4>
                        <p>Am terminated it excellence invitation projection as. She graceful shy believed distance use
                            nay. Lively is people so basket ladies window expect.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box-simple box-white same-height">
                        <div class="icon"><i class="fa fa-globe"></i></div>
                        <h4>Bayar</h4>
                        <p>Am terminated it excellence invitation projection as. She graceful shy believed distance use
                            nay. Lively is people so basket ladies window expect.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white bar">
        <div class="container">
            <div class="heading text-center">
                <h2>Lapangan Tersedia</h2>
            </div>
            <p class="lead"></p>
            <!-- row -->
            <div class="row">
                <?php //var_dump($items);?>
            <?php $i = 0; ?>
            @foreach($lap as $l)
                <!-- item -->
                    <div class="col-lg-3">
                        <div class="box-simple box-white same-height">
                            <div class="home-blog-post">
                                <div class="image" style="min-height: 150px; height: 10px"><img
                                            src="{{asset('images/lapangan/')}}/{{$l->foto}}" alt="..."
                                            class="img-fluid">
                                    <!-- <div class="overlay d-flex align-items-center justify-content-center"><a href="#" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div> -->
                                </div>
                                <div class="text">
                                    <h4><a href="{{"/detail/$l->id"}}">{{$l->name}}</a></h4>
                                    <p class="intor">
                                    <div>{{$l->price}},-/jam</div>
                                    <div>Tersedia: Tersedia</div>
                                    <div>Rating: 1</div>
                                    </p>
                                    <a href="{{"/detail/$l->id"}}" class="btn btn-template-outlined btn-block">Book now</a>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
            <!-- item -->
            </div>
            <!-- row -->
        </div>
    </section>
@endsection
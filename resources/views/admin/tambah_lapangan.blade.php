@extends('layouts.headerfooter')
@section('content')
    <!-- page content -->
    <div class="col-lg-10 align-self-lg-center">
        <div class="card">
            <div class="card-header">
                <strong>Basic Form</strong> Elements
            </div>
            @if(Session::has('message'))
                <div class="alert alert-success">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif
            <div class="card-body card-block">
                <form action="/post_lapangan" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text" class=" form-control-label">Nama Lapangan</label>
                        </div>
                        <div class="col-6 col-md-6"><input type="text" id="name" name="name"
                                                           placeholder="Nama Lapangan" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text" class=" form-control-label">Price</label></div>
                        <div class="col-6 col-md-6"><input type="text" id="price" name="price"
                                                           placeholder="Price" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text" class=" form-control-label">Alamat</label></div>
                        <div class="col-6 col-md-6"><input type="text" id="alamat" name="alamat"
                                                           placeholder="Alamat" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <input style="font-size: small ; margin-left:59%" type="button" class="btn-info gllpSearchButton" value="Cari Koordinat">
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-12">
                            <div class="gllpMap col-lg-11" style="font-size: medium" >Google Maps</div>
                            <input type="hidden" class="gllpZoom" value="4"/>
                        </div>
                    </div>


                    <div class="row form-group">
                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Foto</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="file" id="foto" name="foto"
                                                            class="form-control-file"></div>
                    </div>
                {{--<div class="row form-group">--}}
                {{--<div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Multiple--}}
                {{--File input</label></div>--}}
                {{--<div class="col-12 col-md-9"><input type="file" id="file-multiple-input"--}}
                {{--name="file-multiple-input" multiple=""--}}
                {{--class="form-control-file"></div>--}}
                {{--</div>--}}
                    <div class="card-footer">
                        <center>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- /page content -->
@endsection
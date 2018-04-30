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
                    <div class="form-group gllpLatlonPicker">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text" class=" form-control-label">Nama
                                    Lapangan</label>
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
                        <div class="row form-group {{ $errors->has('Business address') ? ' has-error' : '' }}">
                            <div class="col col-md-3">
                                <label for="name" style="font-size: small">Alamat Usaha</label>
                            </div>
                            <div class="col-6 col-md-6">
                                <input style="font-size: small" type="text" class="form-control gllpSearchField" name="alamat"
                                       placeholder="Masukkan alamat">
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('Business address') ? ' has-error' : '' }}">
                            <div class="col col-md-3">
                                <label for="name" style="font-size: small"></label>
                            </div>
                            <div class="col-lg-0">
                                <label for="name" style="font-size: small"></label>
                            </div>
                            <div class="col-6 col-md-6">
                                <input style="font-size: small ; margin-left:59%" type="button"
                                       class="btn-info gllpSearchButton" value="Cari Koordinat">
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('Business address') ? ' has-error' : '' }}">
                            <div class="col col-md-12">
                                <div class="gllpMap col-6 col-md-6" style="font-size:10px">Google Maps</div>
                                <input type="hidden" class="gllpZoom" value="4"/>
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('Business lat') ? ' has-error' : '' }}">
                            <div class="col col-md-3">
                                <label for="name" style="font-size: small">Latitude</label>
                            </div>
                            <div class="col-6 col-md-6">
                                <input readonly style="font-size: small" type="text" id="latShow" name="lat"
                                       class="gllpLatitude form-control" placeholder="Latitude" required/>
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('Business lang') ? ' has-error' : '' }}">
                            <div class="col col-md-3">
                                <label for="name" style="font-size: small">Longitude</label>
                            </div>
                            <div class="col-6 col-md-6">
                                <input readonly style="font-size: small" type="text" id="lngShow" name="lang"
                                       class="gllpLongitude form-control" placeholder="Longitude" required/>
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Foto</label>
                            </div>
                            <div class="col-12 col-md-9"><input type="file" id="foto" name="foto"
                                                                class="form-control-file"></div>
                        </div>


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
    {{--<script>--}}
    {{--function myMap() {--}}
    {{--var mapProp= {--}}
    {{--center:new google.maps.LatLng(51.508742,-0.120850),--}}
    {{--zoom:5,--}}
    {{--};--}}
    {{--var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);--}}
    {{--}--}}
    {{--</script>--}}
    {{--<script src="{{asset ('js/jquery-gmaps-latlon-picker.js')}}"></script>--}}
    {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAeEUaVoJVvWz34ImZQocpGt0P4jFhaC80"></script>--}}
    {{--<script>--}}
    {{--$.gMapsLatLonPickerNoAutoInit = 1;--}}
    {{--</script>--}}
    <!-- /page content -->
@endsection
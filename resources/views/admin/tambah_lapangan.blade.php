@extends('layouts.headerfooter')
@section('content')
    <!-- page content -->
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <strong>Basic Form</strong> Elements
            </div>
            <div class="card-body card-block">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jenis
                                Lapangan</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input"
                                                            placeholder="Text" class="form-control">
                            <small class="form-text text-muted">This is a help text</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Price</label>
                        </div>
                        <div class="col-6 col-md-3"><input type="email" id="email-input" name="email-input"
                                                           placeholder="Enter Email" class="form-control">
                            <small class="help-block form-text">Please enter your email</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input"
                                                            class="form-control-file"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Multiple
                                File input</label></div>
                        <div class="col-12 col-md-9"><input type="file" id="file-multiple-input"
                                                            name="file-multiple-input" multiple=""
                                                            class="form-control-file"></div>
                    </div>
                </form>
            </div>
            <div>
                <center>
                    <div class="margin">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                </center>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
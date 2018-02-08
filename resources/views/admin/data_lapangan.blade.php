@extends('layouts.headerfooter')
@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lapangan</th>
                                    <th>Harga</th>
                                    <th>Jenis Lapangan</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>System Architect</td>
                                    <td>Kamis, 8 February 2017</td>
                                    <td>Kamis, 8 February 2017</td>
                                    <td>$320,800</td>
                                    <td>
                                        <button type="button" class="btn btn-inline btn-success btn-sm ladda-button" title="tambah" name="button" data-toggle="modal" data-target="#modaledit" ><span class="fa fa-plus"></span></button>
                                        <button type="button" class="btn btn-inline btn-warning btn-sm ladda-button" title="tambah" name="button" data-toggle="modal" data-target="#modaledit" ><span class="fa fa-edit"></span></button>
                                        <button type="delete" name="delete" id="btnhapus" value="delete" class="btn btn-inline btn-danger btn-sm ladda-button" onclick="return confirm('Are you sure to delete this data');"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>System Architect</td>
                                    <td>Kamis, 10 February 2017</td>
                                    <td>Kamis, 10 February 2017</td>
                                    <td>$320,800</td>
                                    <td>
                                        <button type="button" class="btn btn-inline btn-success btn-sm ladda-button" title="tambah" name="button" data-toggle="modal" data-target="#modaledit" ><span class="fa fa-plus"></span></button>
                                        <button type="button" class="btn btn-inline btn-warning btn-sm ladda-button" title="tambah" name="button" data-toggle="modal" data-target="#modaledit" ><span class="fa fa-edit"></span></button>
                                        <button type="delete" name="delete" id="btnhapus" value="delete" class="btn btn-inline btn-danger btn-sm ladda-button" onclick="return confirm('Are you sure to delete this data');"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </div><!-- .animated -->
@endsection
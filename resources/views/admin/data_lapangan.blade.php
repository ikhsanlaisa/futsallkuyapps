@extends('layouts.headerfooter')
@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" onclick="location.href ='/tambah_lapangan'" class="btn btn-primary">Tambah data</button>
                            <a href=""></a>
                        </div>
                        @if(!empty($lap))
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lapangan</th>
                                    <th>Harga</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1 ?>
                                @foreach($lap as $l)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$l->name}}</td>
                                    <td>{{$l->price}}</td>
                                    <td><img src="images/lapangan/{{$l->foto}}" class="img-thumbnail" width="100" height="100"/></td>
                                    {{--<td>$320,800</td>--}}
                                    <td>
                                        <center>
                                            {{--<button type="button" class="btn btn-inline btn-success btn-sm ladda-button" title="tambah" name="button" data-toggle="modal" data-target="#modaledit" onclick="location.href='/tambah_lapangan';" ><span class="fa fa-plus"></span></button>--}}
                                            <button type="button" class="btn btn-inline btn-warning btn-sm ladda-button"
                                                    title="tambah" name="button" data-toggle="modal"
                                                    data-target="#modaledit"><span class="fa fa-edit"></span></button>
                                            <button type="delete" name="delete" id="btnhapus" value="delete"
                                                    class="btn btn-inline btn-danger btn-sm ladda-button"
                                                    onclick="return confirm('Are you sure to delete this data');"><i
                                                        class="fa fa-trash"></i></button>
                                        </center>
                                    </td>
                                </tr>
                                @endforeach
                                <?php ;?>
                                </tbody>
                            </table>
                        </div>
                            @endif
                    </div>
                </div>

            </div>
        </div>
    </div><!-- .animated -->

    <!-- modal -->
    <div class="modal fade"
         id="modaledit"
         tabindex="-1"
         role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                </div>
                <form id="formEdit" action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="put">

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Nama Lapangan :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Price :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="price" id="price">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Upload Foto</label></div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="file-input" name="foto" id="foto" class="form-control-file" onchange="ValidateSize(this)" accept="image/*">
                                <small style="color:red">*Max file 200Kb</small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-rounded btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->
    <script>
        function ValidateSize(file) {
            var FileSize = file.files[0].size / 1024 / 1024;
            if (FileSize > 2) {
                alert('File size exceeds 2 MB');
                $(file).val('');
            } else {

            }
        }
        function showModal(id) {
            document.getElementById('formEdit').action = "/updatedatakelas/"+ id;
            console.log("diklik " + id);
            nama_kelas = document.getElementById('kelas');
            foto = document.getElementById('foto');
            $.ajax({
                type: 'GET',
                url: '/detaildatalapangan/' + id,
                dataType: 'json',
                success: function (kelas) {
                    if (kelas[0] !== null) {
                        console.log('data = ' + kelas);
                        console.log('datanya 2 = ' + kelas[0].id);
                        nama_kelas.value = kelas[0].nama_kelas;
                        foto.value = kelas[0].foto;

                    } else {
                        console.log('null')
                        nama_kelas.value = "";
                        foto.value = "";
                    }

                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log("error bro");
                    console.log(textStatus);
                    console.log(errorThrown);

                }
            });
        }
    </script>
@endsection
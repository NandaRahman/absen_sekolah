@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Siswa</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Guru
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="status" class="col-lg-2"></div>
                    <div id="menu" class="col-lg-2"></div>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                        <tr>
                            <th>Foto / Nomor</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th hidden>kelas</th>
                            <th hidden>status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($siswa))
                            @foreach($siswa as $val)
                                <tr >
                                    <td class="text-center"><img height="100px" src="{{asset('public/galeri/foto/siswa')}}/{{$val->foto}}" alt="Foto Siswa"><br>
                                        @if(!empty($val->nomor_pelajar)){{$val->nomor_pelajar}}@else Belum Ada Nomor @endif</td>
                                    <td>
                                        <form id="update-{{$val->id}}" action="{{route('admin.siswa.edit')}}" method="post"></form>
                                        <input type="hidden" form="update-{{$val->id}}" value="{{$val->id}}" name="id" class="form-control">
                                        <input type="text" form="update-{{$val->id}}" value="{{$val->nama}}" name="nama" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" form="update-{{$val->id}}" name="alamat" value="{{$val->alamat}}" class="form-control">
                                    </td>
                                    <td>
                                        <select class="form-control col-11" form="update-{{$val->id}}" name="kelas">
                                            @foreach($kelas as $dat)
                                                <option value="{{$dat->id}}" @if($val->kelas == $dat->id) selected @endif >{{$dat->kelas}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control col-11" form="update-{{$val->id}}" name="status">
                                            @foreach($status as $dat)
                                                <option value="{{$dat->id}}" @if($val->status == $dat->id) selected @endif >{{$dat->status}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td hidden>{{$val->getRelation('kelas')->kelas}}</td>
                                    <td hidden>{{$val->getRelation('status')->status}}</td>
                                    <td class="text-center">
                                        <button type="button"  data-toggle="modal" data-target="#detail-{{$val->id}}" class="btn btn-success"><i class="fa fa-eye"></i></button>
                                        <button type="submit" form="update-{{$val->id}}" class="btn btn-warning"><i class="fa fa-edit" style="color: white"></i></button>
                                        <button type="button" class="btn btn-danger"><a href="{{route('admin.siswa.hapus',["id"=>$val->id])}}"><i class="fa fa-trash" style="color: white"></i></a></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
    </div>

    @if(!empty($siswa))
        @foreach($siswa as $val)
            <div class="modal fade" id="detail-{{$val->id}}" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Wali Siswa</h5>
                        </div>
                        <div class="modal-body" id="content">
                            {{$val->getRelation('wali')->nama}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif


    <script>
        $(document).ready(function() {
            $("form[id^='update-']" ).submit( function (e){
                if(confirm("Apakah anda ingin mengupdate data ??")){
                }else {
                    e.preventDefault();
                    console.log(formData)
                }
            });
            $('#dataTables').DataTable({
                ordering:false,
                sScrollX: "100%",
                bScrollCollapse: true,
                initComplete: function() {
                    var table = this.api();
                    var data = this.api().column(5);
                    var menu = $('<select class="form-control filter-menu"><option value="">-- Kelas --</option></select>')
                        .appendTo('#menu')
                        .on('change', function() {
                            var val = $(this).val();
                            data.search(val ? '^' + $(this).val() + '$' : val, true, false).draw();
                        });
                    data.data().unique().sort().each(function(d, j) {
                        menu.append('<option value="' + d + '">' + d + '</option>');
                    });
                    var status = this.api().column(6);
                    var value = $('<select class="form-control filter-menu"><option value="">-- Status Siswa --</option></select>')
                        .appendTo('#status')
                        .on('change', function() {
                            var val = $(this).val();
                            status.search(val ? '^' + $(this).val() + '$' : val, true, false).draw();
                        });
                    status.data().unique().sort().each(function(d, j) {
                        if (d == "aktif"){
                            value.append('<option value="' + d + '" selected>' + d + '</option>');
                        }else {
                            value.append('<option value="' + d + '">' + d + '</option>');
                        }
                    });
                    status.search("aktif").draw()
                },


        });
            $("#foto").change(function(e) {
                console.log(this.files[0].size);
                if(this.files[0].size > 100000){
                    $(this).val(null);
                    $('#blah').attr('src', null);
                    alert("Ukuran File Terlalu Besar (Max. 100kb)")
                }
                printImage(this)
            });

        });
    </script>
@endsection

@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Penerimaan</h1>
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
                    <div id="menu" class="form-group col-lg-2 col-sm-4"></div>
                    <div id="status" class="form-group col-lg-2 col-sm-4"></div>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                        <tr>
                            <th>Foto / Nomor</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Detail / Edit</th>
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
                                        <button type="button" class="btn btn-primary"><a  style="color: white;text-decoration: none" href="{{route('admin.penerimaan.terima',["id"=>$val->id])}}"><i class="fa fa-check" style="color: white"></i> Terima</a></button>
                                        <button type="button" class="btn btn-danger"><a  style="color: white;text-decoration: none" href="{{route('admin.siswa.hapus',["id"=>$val->id])}}"><i class="fa fa-trash" style="color: white"></i> Tolak</a></button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button"  data-toggle="modal" data-target="#detail-{{$val->id}}" class="btn btn-success"><i class="fa fa-eye"></i></button>
                                        <button type="submit" form="update-{{$val->id}}" class="btn btn-warning"><i class="fa fa-edit" style="color: white"></i></button>
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

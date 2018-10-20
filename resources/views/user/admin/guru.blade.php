@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Guru</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Guru
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Token Login</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($guru))
                            @foreach($guru as $val)
                                <tr class="odd gradeX">
                                    <td class="text-center"><img height="100px" src="{{asset('galeri/foto/guru')}}/{{$val->foto}}" alt="{{asset('galeri/foto/guru')}}/{{$val->foto}}"></td>
                                    <td>@if(empty($val->nomor_pegawai))N/A @else {{$val->nomor_pegawai}} @endif</td>
                                    <td>{{$val->getRelation('user')->nama}}</td>
                                    <td>{{$val->getRelation('user')->email}}</td>
                                    <td>{{$val->getRelation('user')->token_first_login}}</td>
                                    <td>
                                        <button type="button"  data-toggle="modal" data-target="#detail-{{$val->id}}" class="btn btn-success"><i class="fa fa-eye"></i></button>
                                        <button type="button" class="btn btn-danger"><a href="{{route('admin.guru.hapus',['id'=>$val->getRelation('user')->id])}}"><i class="fa fa-trash" style="color: white"></i></a></button>
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
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambah
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form action="{{route('admin.guru')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="nomor_pegawai">Nomor Pegawai <span style="color: green; font-size: 10px">*tidak wajib</span></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="nomor_pegawai" id="nomor_pegawai" placeholder="Masukan Nama Lengkap">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="nama">Nama Lengkap</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Lengkap" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="email">Email</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Masukan Nama Lengkap" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="alamat">Alamat</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat Lengkap" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="telepon">Telepon</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control phone-input" name="telepon" id="telepon" placeholder="Masukan No.Telp" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="tempat_lahir">Tempat Lahir</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan Tempat Lahir" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="tanggal_lahir">Tanggal Lahir</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukan Tanggal Lahir" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="tahun_mengajar">Tahun Mengajar</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" name="tahun_mengajar" id="tahun_mengajar" placeholder="Tahun Mengajar" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="status_kepegawaian">Status Kepegawaian</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="status_kepegawaian" id="status_kepegawaian" required>
                                    <option value="Pegawai Tetap">Pegawai Tetap</option>
                                    <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="pendidikan_terakhir">Pendidikan Terakhir</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" placeholder="Tahun Mengajar" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-12" for="foto">Foto Guru (3x4 Max. 100kb)</label>
                            <div class="col-sm-12">
                                <img id="blah" src="#" alt="your image" />
                                <input type="file" class="form-control" name="foto" id="foto" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <br><button class="form-control btn btn-primary " type="submit">Masukan Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(!empty($guru))
        @foreach($guru as $val)
            <div class="modal fade" id="detail-{{$val->id}}" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail Guru</h5>
                        </div>
                        <div class="modal-body" id="content">
                            <div class="row">
                                <form id="update-{{$val->id}}" action="{{route('admin.guru.edit')}}" method="post">
                                    <input type="hidden" class="form-control" name="user_id" id="nama_siswa" placeholder="Masukan Nama Lengkap" value="{{$val->getRelation('user')->id }}" required>
                                    <input type="hidden" class="form-control" name="id" id="nama_siswa" placeholder="Masukan Nama Lengkap" value="{{$val->id}}" required>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="nama">Nama Lengkap</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Lengkap" value="{{$val->getRelation('user')->nama}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="email">Email</label>
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email Lengkap" value="{{$val->getRelation('user')->email}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="nomor_pegawai">Nomor Pegawai</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="nomor_pegawai" id="nomor_pegawai" placeholder="Masukan Nomor Pegawai" value="{{$val->nomor_pegawai}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="alamat">Alamat</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="alamat" id="alamat" value="{{$val->alamat}}" placeholder="Jl.Nama Jalan XII/24, Kota" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="telepon">Telepon</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="telepon" id="telepon" value="{{$val->telepon}}" placeholder="Telepon" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="tempat_lahir">Tempat Lahir</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"  value="{{$val->tempat_lahir}}" placeholder="Masukan Tempat Lahir" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="tanggal_lahir">Tanggal Lahir</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"  value="{{$val->tanggal_lahir}}" placeholder="Masukan Tanggal Lahir" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="tahun_mengajar">Tahun Mengajar</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="tahun_mengajar" id="tahun_mengajar"  value="{{$val->tahun_mengajar}}" placeholder="Masukan Tahun Mengajar" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="status_kepegawaian">Status Kepegawaian</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="status_kepegawaian" id="status_kepegawaian" required>
                                                <option value="Pegawai Tetap" @if($val->status_kepegawaian == "Pegawai Tetap") selected @endif>Pegawai Tetap</option>
                                                <option value="Pegawai Tidak Tetap" @if($val->status_kepegawaian == "Pegawai Tidak Tetap") selected @endif>Pegawai Tidak Tetap</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="pendidikan_terakhir" value="{{$val->pendidikan_terakhir}}" id="pendidikan_terakhir" placeholder="Pendidikan Terakhir" required>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" form="update-{{$val->id}}" class="btn btn-warning"><i class="fa fa-edit" style="color: white"></i> Ubah Data </button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @endforeach
    @endif


    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable({
                ordering:false,
                sScrollX: "100%",
                bScrollCollapse: true
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
    <style>
        .dataTables_filter, .dataTables_grouping { display: none; }
    </style>
@endsection

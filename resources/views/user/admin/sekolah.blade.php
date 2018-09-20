@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sekolah</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Sekolah
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-hover" id="dataTables">
                        <thead>
                            <tr>
                                <th style="width: 20%"></th>
                                <th style="width: 5%"></th>
                                <th style="width: 75%"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(!empty($sekolah))
                            @foreach($sekolah as $val)
                                <tr>
                                    <td>NSS</td>
                                    <td>:</td>
                                    <td><input  form="form-update" type="number" class="form-control" name="nss" value="{{$val->NSS}}"></td>
                                </tr>
                                <tr>
                                    <td>NPSN</td>
                                    <td>:</td>
                                    <td><input  form="form-update" type="number" class="form-control" name="npsn" value="{{$val->NPSN}}"></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><input  form="form-update" type="text" class="form-control" name="nama" value="{{$val->nama}}"></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td><textarea form="form-update" type="text" class="form-control" name="deskripsi">{{$val->deskripsi}}</textarea></td>
                                </tr>
                                <tr>
                                    <td>Didirikan</td>
                                    <td>:</td>
                                    <td><input form="form-update" type="date" class="form-control" name="didirikan" value="{{$val->didirikan}}"></td>
                                </tr>
                                <tr>
                                    <td>Akreditas</td>
                                    <td>:</td>
                                    <td><input form="form-update" type="text" class="form-control" name="akreditasi" value="{{$val->akreditasi}}"></td>
                                </tr>
                                <tr>
                                    <td>Visi Misi</td>
                                    <td>:</td>
                                    <td><textarea form="form-update" type="text" class="form-control" name="visi_misi">{{$val->visi_misi}}</textarea></td>
                                </tr>
                                <tr>
                                    <td>Kepala Sekolah</td>
                                    <td>:</td>
                                    <td><input form="form-update" type="text" class="form-control" name="kepala_sekolah" value="{{$val->kepala_sekolah}}"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><textarea form="form-update" type="text" class="form-control" name="alamat">{{$val->alamat}}</textarea></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><input form="form-update" type="text" class="form-control" name="email" value="{{$val->email}}"></td>
                                </tr>
                                <tr>
                                    <td>Sertifikasi</td>
                                    <td>:</td>
                                    <td><textarea form="form-update" type="text" class="form-control" name="sertifikasi">{{$val->sertifikasi}}</textarea></td>
                                </tr>
                                <tr>
                                    <td>Yayasan</td>
                                    <td>:</td>
                                    <td><textarea form="form-update" type="text" class="form-control" name="yayasan">{{$val->yayasan}}</textarea></td>
                                </tr>
                                <tr>
                                    <td>Max. Penerimaan Siswa Baru</td>
                                    <td>:</td>
                                    <td><input form="form-update" type="number" class="form-control" name="penerimaan_siswa" value="{{$val->penerimaan_siswa}}"></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <form id="form-update" action="{{route('admin.sekolah.update')}}" method="post">
                                        </form>
                                        <button form="form-update" type="submit" class="btn btn-success"><i class="fa fa-edit" style="color: white"></i> Ubah</button>
                                        @if($val->buka_penerimaan > 0)
                                            <button type="button" class="btn btn-warning"><a href="{{route('admin.sekolah.tutup')}}" style="color: white; text-decoration: none"><i class="fa fa-eye"></i> Tutup Penerimaan</a></button>
                                        @else
                                            <button type="button" class="btn btn-danger"><a href="{{route('admin.sekolah.buka')}}" style="color: white; text-decoration: none"><i class="fa fa-eye"></i> Buka Penerimaan</a></button>
                                        @endif
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
@endsection

@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>SURAT PERNYATAAN</h1>
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="{{route("pernyataan")}}" method="post">
                    <div class="form-group form-inline row">
                        <div class="col-md-offset-2">Yang bertanda tangan di bawah ini :</div>
                    </div>
                    <div class="form-group form-inline row">
                        <label for="nama_wali" class="col-md-3">Nama : </label>
                        <input type="text" id="nama_wali" name="nama_wali" class="form-control col-md-7">
                    </div>
                    <div class="form-group form-inline row">
                        <label for="ttl_wali" class="col-md-3">TTL : </label>
                        <input type="text" id="ttl_wali" name="ttl_wali" class="form-control col-md-7">
                    </div>
                    <div class="form-group form-inline row">
                        <label for="alamat_wali" class="col-md-3">Alamat : </label>
                        <input type="text" id="alamat_wali" name="alamat_wali" class="form-control col-md-7">
                    </div>
                    <div class="form-group form-inline row">
                        <div class="col-md-offset-2">Selaku Orang Tua / Wali Murid dari siswa bernama :</div>
                    </div>
                    <div class="form-group form-inline row">
                        <label for="nama_siswa" class="col-md-3">Nama : </label>
                        <input type="text" id="nama_siswa" name="nama_siswa" class="form-control col-md-7">
                    </div>
                    <div class="form-group form-inline row">
                        <label for="ttl_siswa" class="col-md-3">TTL : </label>
                        <input type="text" id="ttl_siswa" name="ttl_siswa" class="form-control col-md-7">
                    </div>
                    <div class="form-group form-inline row">
                        <label for="alamat_siswa" class="col-md-3">Alamat : </label>
                        <input type="text" id="alamat_siswa" name="alamat_siswa" class="form-control col-md-7">
                    </div>
                    <div class="form-group form-inline row">
                        <div class="col-md-offset-2">Menyatakan bahwa anak tersebut di atas belum memiliki kelengkapan administrasi berupa :</div>
                    </div>
                    <div class="form-group row">
                        <label for="akte" class="col-md-9">Belum memiliki Akte Kelahiran </label>
                        <input type="checkbox" id="akte" name="akte" class="form-control col-md-3 text-left" value="1">
                    </div>
                    <div class="form-group row">
                        <label for="kk_ortu" class="col-md-9">Orang Tua belum memiliki kartu keluarga </label>
                        <input type="checkbox" id="kk_ortu" name="kk_ortu" class="form-control col-md-3 text-left" value="1">
                    </div>
                    <div class="form-group row">
                        <label for="kk_anak" class="col-md-9">Orang Tua Memiliki KK tetapi anak tersebut belum dimasukkan kedalam KK </label>
                        <input type="checkbox" id="kk_anak" name="kk_anak" class="form-control col-md-3 text-left" value="1">
                    </div>
                    <input type="submit" class="form-control col-md-10">
                </form>
            </div>
        </div>
    </div>
@endsection
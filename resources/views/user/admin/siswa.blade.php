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
                    <div id="kelas" class="col-lg-2"></div>
                    <form id="kelas-update" action="{{route('admin.siswa.kelas')}}" method="post"></form>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                        <tr>
                            <th></th>
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
                                    <td class="text-center">
                                        <input type="checkbox" class="selected-menu" form="kelas-update" name="id[]" value="{{$val->id}}">
                                    </td>
                                    <td class="text-center">
                                        <img height="100px" src="{{asset('galeri/foto/siswa')}}/{{$val->foto}}" alt="Foto Siswa"><br>
                                        @if(!empty($val->nomor_pelajar)){{$val->nomor_pelajar}}@else Belum Ada Nomor @endif</td>
                                    <td>
                                        {{$val->nama}}
                                    </td>
                                    <td>
                                        {{$val->alamat}}
                                    </td>
                                    <td>
                                        {{$val->getRelation('kelas')->kelas }}
                                    </td>
                                    <td>
                                        {{$val->getRelation('status')->status }}
                                    </td>
                                    <td hidden>{{$val->getRelation('kelas')->kelas}}</td>
                                    <td hidden>{{$val->getRelation('status')->status}}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary download_pdf" siswa="{{$val->id}}"><span><i class="fa fa-download"></i></span></button>
                                        <button type="button"  data-toggle="modal" data-target="#detail-{{$val->id}}" class="btn btn-success"><i class="fa fa-eye"></i></button>
                                        <button type="button" class="btn btn-danger"><a href="{{route('admin.siswa.hapus',["id"=>$val->id])}}"><i class="fa fa-trash" style="color: white"></i></a></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="text-center"><input id="check_all" type="checkbox"> Check All</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>
                                <select class="form-control col-11" form="kelas-update" name="kelas">
                                    <option  value="" selected>-- Pilih Kelas --</option>
                                    @foreach($kelas as $dat)
                                        <option value="{{$dat->id}}" >{{$dat->kelas}}</option>
                                    @endforeach
                                </select>
                            </th>
                            <th>
                                <select class="form-control col-11" form="kelas-update" name="status">
                                    <option value="" selected>-- Pilih Status --</option>
                                    @foreach($status as $dat)
                                        <option value="{{$dat->id}}">{{$dat->status}}</option>
                                    @endforeach
                                </select>
                            </th>
                            <th hidden>kelas</th>
                            <th hidden>status</th>
                            <th class="text-center"><button type="submit" form="kelas-update" class="btn btn-primary"><i class="fa fa-edit" style="color: white"></i> Ubah Kelas </button></th>
                        </tr>
                        </tfoot>
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
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Detail</h5>
                        </div>
                        <div class="modal-body" id="content">
                            <div class="row">
                                <form id="update-{{$val->id}}" action="{{route('admin.siswa.edit')}}" method="post">
                                    <div @if(sizeof($val->getRelation('wali'))==2) class="col-lg-4" @else class="col-lg-3" @endif>
                                        <h2>Siswa</h2>
                                        <input type="hidden" class="form-control" name="siswa[id]" id="nama_siswa" placeholder="Masukan Nama Lengkap" value="{{$val->id}}" required>
                                        <div class="form-group">
                                            <label class="control-label col-sm-12" for="nama_siswa">Nama Lengkap</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="siswa[nama]" id="nama_siswa" placeholder="Masukan Nama Lengkap" value="{{$val->nama}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-12" for="nomor_pelajar">Nomor Pelajar</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" name="siswa[nomor_pelajar]" id="nomor_pelajar" placeholder="Masukan Nomor Pelajar" value="{{$val->nomor_pelajar}}">
                                            </div>
                                        </div>
                                        <div  class="form-group">
                                            <label class="control-label col-sm-12" for="jenis_kelamin_siswa">Jenis Kelamin</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="siswa[jenis_kelamin]" id="jenis_kelamin_siswa" required>
                                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                                    <option value="L" @if($val->jenis_kelamin == "L") selected @endif>Laki laki</option>
                                                    <option value="P" @if($val->jenis_kelamin == "P") selected @endif>Perumpuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-12" for="telepon">Telepon</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="siswa[telepon]" id="telepon" value="{{$val->alamat}}" placeholder="Jl.Nama Jalan XII/24, Kota" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-12" for="alamat_siswa">Alamat</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="siswa[alamat]" id="alamat_siswa" value="{{$val->alamat}}" placeholder="Jl.Nama Jalan XII/24, Kota" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-12" for="tempat_lahir_siswa">Tempat Lahir</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="siswa[tempat_lahir]" id="tempat_lahir_siswa"  value="{{$val->tempat_lahir}}" placeholder="Masukan Tempat Lahir" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-12" for="tanggal_lahir_siswa">Tanggal Lahir</label>
                                            <div class="col-sm-12">
                                                <input type="date" class="form-control" name="siswa[tanggal_lahir]" id="tanggal_lahir_siswa"  value="{{$val->tanggal_lahir}}" placeholder="Masukan Tanggal Lahir" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-12" for="kebangsaan_siswa">Kebangsaan</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="siswa[kebangsaan]" id="kebangsaan_siswa" required>
                                                    <option value="">-- Pilih Kebangsaan --</option>
                                                    <option value="WNI" @if($val->kebangsaan == "WNI") selected @endif>WNI</option>
                                                    <option value="WNA" @if($val->kebangsaan == "WNA") selected @endif>WNA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-12" for="agama_siswa">Agama</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="siswa[agama]" id="agama_siswa"  value="{{$val->agama}}" placeholder="Masukan Agama" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-12" for="anak_ke">Anak Ke</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" name="siswa[anak_ke]" id="anak_ke"  value="{{$val->anak_ke}}" placeholder="Anak Ke" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-12" for="status_anak">Status Anak</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="siswa[status]" id="status_anak" required>
                                                    <option value="">-- Pilih Status Anak --</option>
                                                    <option value="tiri" @if($val->status_anak == "tiri") selected @endif>Tiri</option>
                                                    <option value="kandung" @if($val->status_anak == "kandung") selected @endif>Kandung</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-12" for="jumlah_saudara">Jumlah Saudara</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" name="siswa[jumlah_saudara]" value="{{$val->jumlah_saudara}}" id="jumlah_saudara" placeholder="Jml Saudara" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-12" for="siswa_pindahan_baru">Status Siswa</label>
                                            <div class="col-sm-12">
                                                <select class="form-control" name="siswa[siswa_pindahan_baru]" id="siswa_pindahan_baru" required>
                                                    <option value="">-- Pilih Status --</option>
                                                    <option value="baru"  @if($val->siswa_pindahan_baru == "baru") selected @endif>Siswa Baru</option>
                                                    <option value="pindahan" @if($val->siswa_pindahan_baru == "pindahan") selected @endif>Siswa Pindahan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-12" for="ukuran_sepatu">Ukuran Sepatu</label>
                                            <div class="col-sm-12">
                                                <input type="number" class="form-control" name="siswa[ukuran_sepatu]" value="{{$val->ukuran_sepatu}}" id="ukuran_sepatu" placeholder="Ukuran Sepatu" required>
                                            </div>
                                        </div>
                                        <div  class="form-group">
                                            <label for="akta_siswa" class="control-label col-sm-12">Nomor Kelahiran (Dilihat Di Akta Kelahiran)</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="siswa[akta]" value="{{$val->nomor_akta_kelahiran}}" id="akta_siswa" placeholder="Akta Kelahiran" required>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($val->getRelation('wali') as $wali)
                                        <div @if(sizeof($val->getRelation('wali'))==2) class="col-lg-4" @else class="col-lg-3" @endif>
                                            <h2>{{$wali->kategori()->getResults()->nama}}</h2>
                                            <input type="hidden" class="form-control" name="wali[{{$wali->id}}][id]" id="nama_siswa" placeholder="Masukan Nama Lengkap" value="{{$wali->id}}" required>
                                            <div class="form-group">
                                                <label class="control-label col-sm-12" for="nama_ayah">Nama Lengkap</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="wali[{{$wali->id}}][nama]" id="nama_siswa" placeholder="Masukan Nama Lengkap" value="{{$wali->nama}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-12" for="alamat_ayah">Alamat Lengkap</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="wali[{{$wali->id}}][alamat]" id="alamat_ayah" value="{{$wali->alamat}}" placeholder="Jl.Nama Jalan XII/24, Kota" required>
                                                </div>
                                            </div>
                                            <div  class="form-group">
                                                <label class="control-label col-sm-12" for="nomor_ayah">Nomor Telepon</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control phone-input" name="wali[{{$wali->id}}][nomor]" id="nomor_ayah" placeholder="0828182xxx" value="{{$wali->telepon}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-12" for="tempat_lahir_ayah">Tempat Lahir</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="wali[{{$wali->id}}][tempat_lahir]" id="tempat_lahir_ayah" placeholder="Masukan Tempat Lahir" value="{{$wali->tempat_lahir}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-12" for="tanggal_lahir_ayah">Tanggal Lahir</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control" name="wali[{{$wali->id}}][tanggal_lahir]" id="tanggal_lahir_ayah" placeholder="Masukan Tanggal Lahir" value="{{$wali->tanggal_lahir}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-12" for="kebangsaan_ayah">Kebangsaan</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="wali[{{$wali->id}}][kebangsaan]"  id="kebangsaan_ayah" required>
                                                        <option value="">-- Pilih Kebangsaan --</option>
                                                        <option value="WNI" @if($wali->kebangsaan == "WNI") selected @endif>WNI</option>
                                                        <option value="WNA" @if($wali->kebangsaan == "WNA") selected @endif>WNA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-12" for="agama_ayah">Agama</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="wali[{{$wali->id}}][agama]" value="{{$wali->agama}}" id="agama_ayah" placeholder="Masukan Agama" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-12" for="pendidikan_terakhir_ayah">Pendidikan Terakhir</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="wali[{{$wali->id}}][pendidikan_terakhir]" value="{{$wali->pendidikan_terakhir}}" id="pendidikan_terakhir_ayah" placeholder="Masukan Pendidikan" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-12" for="pekerjaan_ayah">Pekerjaan</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="wali[{{$wali->id}}][pekerjaan]" value="{{$wali->pekerjaan}}" id="pekerjaan_ayah" placeholder="Masukan Pekerjaan" required>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" form="update-{{$val->id}}" class="btn btn-warning"><i class="fa fa-edit" style="color: white"></i> Ubah Data </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif


    <script>
        $(document).ready(function() {
            $(".download_pdf").click(function() {
                var formData = new FormData();
                console.log($(this).attr('siswa'));
                formData.append("id",$(this).attr('siswa'));
                $.ajax({
                    url: "{{route("admin.siswa.cetak")}}",
                    type: 'POST',
                    data: formData,
                    success:function(data){
                        alert("File Downloaded")
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });

            $('#check_all').change(function () {
                if($(this).prop('checked')){
                    $('.selected-menu').each(function() {
                        this.checked = true;
                    });
                }else{
                    $('.selected-menu').each(function() {
                        this.checked = false;
                    });
                }
            });
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
                    var data = this.api().column(6);
                    var menu = $('<select class="form-control filter-menu"><option value="">-- Kelas --</option></select>')
                        .appendTo('#kelas')
                        .on('change', function() {
                            var val = $(this).val();
                            data.search(val ? '^' + $(this).val() + '$' : val, true, false).draw();
                        });
                    data.data().unique().sort().each(function(d, j) {
                        menu.append('<option value="' + d + '">' + d + '</option>');
                    });
                    var status = this.api().column(7);
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
                }
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

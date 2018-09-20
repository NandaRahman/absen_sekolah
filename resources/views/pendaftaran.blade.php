@extends('layouts.regna')
@section('content')

    <!--==========================
  Hero Section
============================-->
    <section id="hero">
        <div class="hero-container">
            <h1>Selamat Datang Di SD Wonokusumo</h1>
            <h2>We are team of talanted designers making websites with Bootstrap</h2>
            <a href="#about" class="btn-get-started">Get Started</a>
        </div>
    </section><!-- #hero -->

    <main id="main">
        <!--==========================
          About Us Section
        ============================-->
        <section id="form-school">
            <div class="container wow fadeIn">
                <div class="section-header">
                    <h3 class="section-title">Facts</h3>
                    <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                </div>
                <form id="register-form" action="{{route("pendaftaran")}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12" >
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title">Data Siswa <span style="font-size: 12px; color: red">*) Wajib Diisi</span></h2>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="nama_siswa">Nama Lengkap</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Masukan Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div  class="form-group">
                                        <label class="control-label col-sm-12" for="jenis_kelamin_siswa">Jenis Kelamin</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="jenis_kelamin_siswa" id="jenis_kelamin_siswa" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="L">Laki laki</option>
                                                <option value="P">Perumpuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="alamat_siswa">Alamat</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="alamat_siswa" id="alamat_siswa" placeholder="Jl.Nama Jalan XII/24, Kota" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="tempat_lahir_siswa">Tempat Lahir</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="tempat_lahir_siswa" id="tempat_lahir_siswa" placeholder="Masukan Tempat Lahir" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="tanggal_lahir_siswa">Tanggal Lahir</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" name="tanggal_lahir_siswa" id="tanggal_lahir_siswa" placeholder="Masukan Tanggal Lahir" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="kebangsaan_siswa">Kebangsaan</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="kebangsaan_siswa" id="kebangsaan_siswa" required>
                                                <option value="">-- Pilih Kebangsaan --</option>
                                                <option value="WNI">WNI</option>
                                                <option value="WNA">WNA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="agama_siswa">Agama</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="agama_siswa" id="agama_siswa" placeholder="Masukan Agama" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="anak_ke">Anak Ke</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="anak_ke" id="anak_ke" placeholder="Anak Ke" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="status_anak">Status Anak</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="status_anak" id="status_anak" required>
                                                <option value="">-- Pilih Status Anak --</option>
                                                <option value="tiri">Tiri</option>
                                                <option value="kandung">Kandung</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="jumlah_saudara">Jumlah Saudara</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="jumlah_saudara" id="jumlah_saudara" placeholder="Jml Saudara" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="siswa_pindahan_baru">Status Siswa</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="siswa_pindahan_baru" id="siswa_pindahan_baru" required>
                                                <option value="">-- Pilih Status --</option>
                                                <option value="baru" selected>Siswa Baru</option>
                                                <option value="pindahan">Siswa Pindahan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="ukuran_sepatu">Ukuran Sepatu</label>
                                        <div class="col-sm-12">
                                            <input type="number" class="form-control" name="ukuran_sepatu" id="ukuran_sepatu" placeholder="Ukuran Sepatu" required>
                                        </div>
                                    </div>
                                    <div  class="form-group">
                                        <label for="akta_siswa" class="control-label col-sm-12">Nomor Kelahiran (Dilihat Di Akta Kelahiran)<br><span style="font-size: 12px; color: red">Jika tidak ada download <a href="#">formulir ini</a></span></label>
                                        <div id="akta_siswa" class="col-lg-12 form-inline" >
                                            <input type="number" name="akta_1" class="form-control four-input col-lg-2 col-md-3 col-sm-4" placeholder="20xx">
                                            <div class=" col-lg-1 col-md-1 col-sm-1">/</div>
                                            <input type="text" name="akta_2" class="form-control one-input  col-lg-1  col-md-2 col-sm-2" placeholder="F">
                                            <div class="col-lg-1 col-md-1 col-sm-1">/</div>
                                            <input type="number" name="akta_3" class="form-control four-input col-lg-2  col-md-3 col-sm-4" placeholder="20xx">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="foto_siswa">Foto Siswa (3x4 Max. 100kb)</label>
                                        <div class="col-sm-12">
                                            <img id="blah" src="#" alt="your image" />
                                            <input type="file" class="form-control" name="foto_siswa" id="foto_siswa" placeholder="Jl.Nama Jalan XII/24, Kota" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title">Data Ayah <span style="font-size: 12px; color: red">*) Wajib Diisi</span></h2>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="nama_ayah">Nama Lengkap</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Masukan Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="kategori_ayah">Sebagai</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="kategori_ayah" id="kategori_ayah" required>
                                                <option selected>Pilih Sebagai</option>
                                                @if(!empty($kategori_wali))
                                                    @foreach($kategori_wali as $val)
                                                        @if($val->nama == "Ayah")
                                                            <option value="{{$val->id}}" selected>{{$val->nama}}</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option value="ayah">Ayah</option>
                                                    <option value="ibu">ibu</option>
                                                    <option value="nenek">Nenek</option>
                                                    <option value="kakek">Kakek</option>
                                                    <option value="saudara">Saudara</option>
                                                    <option value="lainya">Lainnya</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="alamat_ayah">Alamat Lengkap</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="alamat_ayah" id="alamat_ayah" placeholder="Jl.Nama Jalan XII/24, Kota" required>
                                        </div>
                                    </div>
                                    <div  class="form-group">
                                        <label class="control-label col-sm-12" for="nomor_ayah">Nomor Telepon</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control phone-input" name="nomor_ayah" id="nomor_ayah" placeholder="0828182xxx" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="tempat_lahir_ayah">Tempat Lahir</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="tempat_lahir_ayah" id="tempat_lahir_ayah" placeholder="Masukan Tempat Lahir" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="tanggal_lahir_ayah">Tanggal Lahir</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" name="tanggal_lahir_ayah" id="tanggal_lahir_ayah" placeholder="Masukan Tanggal Lahir" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="kebangsaan_ayah">Kebangsaan</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="kebangsaan_ayah" id="kebangsaan_ayah" required>
                                                <option value="">-- Pilih Kebangsaan --</option>
                                                <option value="WNI">WNI</option>
                                                <option value="WNA">WNA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="agama_ayah">Agama</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="agama_ayah" id="agama_ayah" placeholder="Masukan Agama" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="pendidikan_terakhir_ayah">Pendidikan Terakhir</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="pendidikan_terakhir_ayah" id="pendidikan_terakhir_ayah" placeholder="Masukan Pendidikan" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="pekerjaan_ayah">Pekerjaan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Masukan Pekerjaan" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title">Data Ibu <span style="font-size: 12px; color: red">*) Wajib Diisi</span></h2>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="nama_ibu">Nama Lengkap</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Masukan Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="kategori_ibu">Sebagai</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="kategori_ibu" id="kategori_ibu" required>
                                                <option selected>Pilih Sebagai</option>
                                                @if(!empty($kategori_wali))
                                                    @foreach($kategori_wali as $val)
                                                        @if($val->nama == "Ibu")
                                                            <option value="{{$val->id}}" selected>{{$val->nama}}</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option value="ayah">Ayah</option>
                                                    <option value="ibu">ibu</option>
                                                    <option value="nenek">Nenek</option>
                                                    <option value="kakek">Kakek</option>
                                                    <option value="saudara">Saudara</option>
                                                    <option value="lainya">Lainnya</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="alamat_ibu">Alamat Lengkap</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="alamat_ibu" id="alamat_ibu" placeholder="Jl.Nama Jalan XII/24, Kota" required>
                                        </div>
                                    </div>
                                    <div  class="form-group">
                                        <label class="control-label col-sm-12" for="nomor_ibu">Nomor Telepon</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control phone-input" name="nomor_ibu" id="nomor_ibu" placeholder="0828182xxx" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="tempat_lahir_ibu">Tempat Lahir</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="tempat_lahir_ibu" id="tempat_lahir_ibu" placeholder="Masukan Tempat Lahir" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="tanggal_lahir_ibu">Tanggal Lahir</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" name="tanggal_lahir_ibu" id="tanggal_lahir_ibu" placeholder="Masukan Tanggal Lahir" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="kebangsaan_ibu">Kebangsaan</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="kebangsaan_ibu" id="kebangsaan_ibu" required>
                                                <option value="">-- Pilih Kebangsaan --</option>
                                                <option value="WNI">WNI</option>
                                                <option value="WNA">WNA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="agama_ibu">Agama</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="agama_ibu" id="agama_ibu" placeholder="Masukan Agama" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="pendidikan_terakhir_ibu">Pendidikan Terakhir</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="pendidikan_terakhir_ibu" id="pendidikan_terakhir_ibu" placeholder="Masukan Pendidikan" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="pekerjaan_ibu">Pekerjaan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Masukan Pekerjaan" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title">Data Wali Lain</h2>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="nama_wali">Nama Lengkap</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="nama_wali" id="nama_wali" placeholder="Masukan Nama Lengkap">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="kategori_wali">Sebagai</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="kategori_wali" id="kategori_wali">
                                                <option selected>Pilih Sebagai</option>
                                                @if(!empty($kategori_wali))
                                                    @foreach($kategori_wali as $val)
                                                        @if($val->nama != "Ibu" || $val->nama != "Ayah")
                                                            <option value="{{$val->id}}" selected>{{$val->nama}}</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option value="ayah">Ayah</option>
                                                    <option value="ibu">ibu</option>
                                                    <option value="nenek">Nenek</option>
                                                    <option value="kakek">Kakek</option>
                                                    <option value="saudara">Saudara</option>
                                                    <option value="lainya">Lainnya</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="alamat_wali">Alamat Lengkap</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="alamat_wali" id="alamat_wali" placeholder="Jl.Nama Jalan XII/24, Kota">
                                        </div>
                                    </div>
                                    <div  class="form-group">
                                        <label class="control-label col-sm-12" for="nomor_wali">Nomor Telepon</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control phone-input" name="nomor_wali" id="nomor_wali" placeholder="0828182xxx">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="tempat_lahir_wali">Tempat Lahir</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="tempat_lahir_wali" id="tempat_lahir_wali" placeholder="Masukan Tempat Lahir">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="tanggal_lahir_wali">Tanggal Lahir</label>
                                        <div class="col-sm-12">
                                            <input type="date" class="form-control" name="tanggal_lahir_wali" id="tanggal_lahir_wali" placeholder="Masukan Tanggal Lahir">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="kebangsaan_wali">Kebangsaan</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="kebangsaan_wali" id="kebangsaan_wali">
                                                <option value="">-- Pilih Kebangsaan --</option>
                                                <option value="WNI">WNI</option>
                                                <option value="WNA">WNA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="agama_wali">Agama</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="agama_wali" id="agama_wali" placeholder="Masukan Agama">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="pendidikan_terakhir_wali">Pendidikan Terakhir</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="pendidikan_terakhir_wali" id="pendidikan_terakhir_wali" placeholder="Masukan Pendidikan">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="pekerjaan_wali">Pekerjaan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" placeholder="Masukan Pekerjaan">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="konifrmasi_wali"></label>
                                        <div class="col-sm-12">
                                            <input type="checkbox" value="setuju" name="konifrmasi_wali" id="konifrmasi_wali"> Centang untuk menyetujui data wali ini
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 1em;">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Daftarkan</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script>
        $(document).ready(function () {
            var pdf;

            $("#foto_siswa").change(function(e) {
                console.log(this.files[0].size);
                if(this.files[0].size > 100000){
                    $(this).val(null);
                    $('#blah').attr('src', null);
                    alert("Ukuran File Terlalu Besar (Max. 100kb)")
                }
                printImage(this)
            });
            $("form#register-form").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $("#loadMe").modal({
                    backdrop: "static", //remove ability to close modal with click
                    keyboard: false //remove option to close with keyboard
                });
                $.ajax({
                    url: $(this).attr("action"),
                    type: 'POST',
                    data: formData,
                    success:function(data){
                        setTimeout(function() {
                            $("#loadMe").modal("hide");
                        }, 1000);
                        if (data.status){
                            pdf = data.data;
                            setTimeout(function() {
                                $("#preview").modal({
                                    backdrop: "static", //remove ability to close modal with click
                                    keyboard: false //remove option to close with keyboard
                                });
                            }, 1100);
                            $("#content").html(pdf)
                        }else{
                            alert("Gagal : "+data.message);
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
            $("#download_pdf").click(function() {
                var formData = new FormData();
                formData.append("data",pdf);
                $.ajax({
                    url: "{{route("pendaftaran.cetak")}}",
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
        });
    </script>
    <div class="modal fade" id="preview" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bukti Pendaftaran</h5>
                </div>
                <div class="modal-body" id="content">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="download_pdf"><span><i class="fa fa-download"></i>Download</span></button>
                    <button type="button" class="btn btn-danger"><a class="btn-link" href="{{route('welcome')}}">Kembali</a></button>
                </div>
            </div>
        </div>
    </div>
@endsection
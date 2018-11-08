@extends('layouts.regna')
@section('content')

<main id="main">
    <!--==========================
      Hero Section
    ============================-->
    <section id="hero">
        <div class="hero-container">
            <h1>Selamat Datang Di <br>{{$sekolah->nama}}</h1>
            <h2>Membentuk siswa yang berprestasi, terampil, dan berakhlak mulia</h2>
        </div>
    </section><!-- #hero -->

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
        <div class="container">
            <div class="row about-container">

                <div class="col-lg-12 content order-lg-1 order-2">
                    <h2 class="title">{{$sekolah->nama}}</h2>
                    <p><pre style="font-family: Arial;">{{$sekolah->visi_misi}}</pre></p>
                </div>

            </div>

        </div>
    </section><!-- #about -->

    <!--==========================
      Facts Section
    ============================-->
    <section id="facts">
        <div class="container">
            <div class="section-header">
                <h3 class="section-title">Riwayat Sekolah</h3>
                <p class="section-description">Lulusan dan jumlah karyawan sekolah saat ini</p>
            </div>
            <div class="row counters">

                <div class="col-lg-4 col-6 text-center">
                    <span >{{$jumlah->siswa}}</span>
                    <p>Siswa</p>
                </div>

                <div class="col-lg-4 col-6 text-center">
                    <span >{{$jumlah->guru}}</span>
                    <p>Guru</p>
                </div>

                <div class="col-lg-4 col-6 text-center">
                    <span >{{$jumlah->lulusan}}</span>
                    <p>Lulusan</p>
                </div>
            </div>

        </div>
    </section><!-- #facts -->

    <!--==========================
      Team Section
    ============================-->
    <section id="team">
        <div class="container">
            <div class="section-header">
                <h3 class="section-title">Guru</h3>
                <p class="section-description">Daftar guru pengajar di SD Wonokusumo Jaya</p>
            </div>
            <div class="row">
                @foreach($guru as $val)
                    <div class="col-lg-2 col-md-4">
                        <div class="member">
                            <div class="pic" style="height: 150px" title="{{asset('galeri/foto/guru')}}/{{$val->foto}}"><img src="{{asset('galeri/foto/guru')}}/{{$val->foto}}" alt="{{asset('galeri/foto/guru')}}/{{$val->foto}}"></div>
                            <h4>{{ $val->user()->first()->nama }}</h4>
                            <span>{{ $val->user()->first()->email }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section><!-- #team -->


    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" style="background: white">
        <div class="container">
            <div class="section-header">
                <h3 class="section-title">Hubungi Kami</h3>
                <p class="section-description">Informasi kontak sekolah</p>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-3 col-md-4">

                    <div class="info">
                        <div>
                            <i class="fa fa-map-marker"></i>
                            <p>{{$sekolah->alamat}}</p>
                        </div>

                        <div>
                            <i class="fa fa-envelope"></i>
                            <p>{{$sekolah->email}}</p>
                        </div>

                        <div>
                            <i class="fa fa-phone"></i>
                            <p>{{$sekolah->email}}</p>
                        </div>

                        <div>
                            <i class="fa fa-building"></i>
                            <p>{{date('d M Y',strtotime($sekolah->didirikan))}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-8">
                    <div id="google-map" data-latitude="-7.226238" data-longitude="112.755061"></div>
                </div>

            </div>

        </div>
    </section><!-- #contact -->

</main>
@endsection
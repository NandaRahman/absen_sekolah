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
                <h3 class="section-title">Fakta</h3>
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
                <h3 class="section-title">Team</h3>
                <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
            </div>
            <div class="row">
                @foreach($guru as $val)
                    <div class="col-lg-2 col-md-4">
                        <div class="member">
                            <div class="pic" title="{{asset('galeri/foto/guru')}}/{{$val->foto}}"><img src="{{asset('galeri/foto/guru')}}/{{$val->foto}}" alt="{{asset('galeri/foto/guru')}}/{{$val->foto}}"></div>
                            <h4>{{ $val->user()->first()->nama }}</h4>
                            <span>{{ $val->user()->first()->email }}</span>
                            <div class="social">
                                <a href=""><i class="fa fa-twitter"></i></a>
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-google-plus"></i></a>
                                <a href=""><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section><!-- #team -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
        <div class="container">
            <div class="section-header">
                <h3 class="section-title">Contact</h3>
                <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
            </div>
        </div>

        <div id="google-map" data-latitude="-7.226238" data-longitude="112.755061"></div>
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

                    <div class="social-links">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>

                </div>

                <div class="col-lg-5 col-md-8">
                    <div class="form">
                        <form action="{{route('saran.add')}}" method="post">
                            <div class="form-group">
                                <input type="text" name="nama" class="form-control" id="name" placeholder="Nama Anda" data-msg="Masukan minimal 4 karakter" required/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="saran" rows="5" placeholder="Saran Anda" required></textarea>
                            </div>
                            <div class="text-center"><button type="submit">Kirim Saran</button></div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- #contact -->

</main>
@endsection
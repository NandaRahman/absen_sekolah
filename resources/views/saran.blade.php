@extends('layouts.regna')
@section('content')

    <!--==========================
  Hero Section
============================-->

    <main id="main">
        <section id="hero" style="max-height: 300px">
            <div class="hero-container">
                <h1>Kritik & saran</h1>
                <h2>Masukan saran untuk pengembangan kami</h2>
            </div>
        </section>
        <section id="form-school" >
            <div class="container wow fadeIn col-lg-4 col-lg-offset-4" >
                <div class="card">
                    <div class="card-body">
                        <div class="form">
                            <h3 class="text-center">Masukkan Saran Anda</h3>
                            <form action="{{route('saran.add')}}" method="post">
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control" id="name" placeholder="Nama Anda" data-msg="Masukan minimal 4 karakter" required/>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="saran" rows="5" placeholder="Saran Anda" required></textarea>
                                </div>
                                <div class="text-center"><button type="submit" class="btn btn-primary">Kirim Saran</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
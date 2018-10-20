@extends('layouts.regna')
@section('content')

    <!--==========================
  Hero Section
============================-->

    <main id="main">
        <section id="hero" style="height: 100px;">
        </section>
        <section id="form-school">
            <div class="container wow fadeIn">
                <div class="section-header">
                    <h3 class="section-title">Pengumuman Sekolah.</h3>
                </div>
            </div>
        </section>
        @if(!empty($pengumuman))
            <section id="form-school" style="background: white">
                <div class="container wow fadeIn" >
                    @foreach($pengumuman as $val)
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{$val->judul}}</h4>
                                <p class="card-text">{{$val->pengumuman}}</p>
                                <span style="font-size: 12px"><i class="fa fa-calendar"></i> {{$val->created_at}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @else
            <section>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                    </button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Pendaftaran belum dibuka silahkan hubungi pihak sekolah untuk informasi lebih lanjut !!
                </div>
            </section>
        @endif
    </main>

@endsection
@extends('layouts.regna')
@section('content')

    <!--==========================
  Hero Section
============================-->

    <main id="main">
        <section id="hero" style="max-height: 300px">
            <div class="hero-container">
                <h1>Pengumuman Sekolah</h1>
                <h2>Informasi dan pengumuman seputar sekolah</h2>
            </div>
        </section>
        @if(!empty($pengumuman))
            <section id="form-school" >
                <div class="container wow fadeIn"  style="overflow-y: scroll; min-height:500px;max-height:1500px;">
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
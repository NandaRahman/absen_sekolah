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

                <div class="col-lg-12 background order-lg-2 order-1 wow fadeInRight"></div>
            </div>

        </div>
    </section><!-- #about -->

    <!--==========================
      Facts Section
    ============================-->
    <section id="facts">
        <div class="container wow fadeIn">
            <div class="section-header">
                <h3 class="section-title">Fakta</h3>
                <p class="section-description">Lulusan dan jumlah karyawan sekolah saat ini</p>
            </div>
            <div class="row counters">

                <div class="col-lg-4 col-6 text-center">
                    <span data-toggle="counter-up">{{$jumlah->siswa}}</span>
                    <p>Siswa</p>
                </div>

                <div class="col-lg-4 col-6 text-center">
                    <span data-toggle="counter-up">{{$jumlah->guru}}</span>
                    <p>Guru</p>
                </div>

                <div class="col-lg-4 col-6 text-center">
                    <span data-toggle="counter-up">{{$jumlah->lulusan}}</span>
                    <p>Lulusan</p>
                </div>
            </div>

        </div>
    </section><!-- #facts -->

    <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio">
        <div class="container wow fadeInUp">
            <div class="section-header">
                <h3 class="section-title">Portfolio</h3>
                <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <ul id="portfolio-flters">
                        <li data-filter=".filter-app, .filter-card, .filter-logo, .filter-web" class="filter-active">All</li>
                        <li data-filter=".filter-app">App</li>
                        <li data-filter=".filter-card">Card</li>
                        <li data-filter=".filter-logo">Logo</li>
                        <li data-filter=".filter-web">Web</li>
                    </ul>
                </div>
            </div>

            <div class="row" id="portfolio-wrapper">
                <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                    <a href="">
                        <img src="img/portfolio/app1.jpg" alt="">
                        <div class="details">
                            <h4>App 1</h4>
                            <span>Alored dono par</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-web">
                    <a href="">
                        <img src="img/portfolio/web2.jpg" alt="">
                        <div class="details">
                            <h4>Web 2</h4>
                            <span>Alored dono par</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                    <a href="">
                        <img src="img/portfolio/app3.jpg" alt="">
                        <div class="details">
                            <h4>App 3</h4>
                            <span>Alored dono par</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-card">
                    <a href="">
                        <img src="img/portfolio/card1.jpg" alt="">
                        <div class="details">
                            <h4>Card 1</h4>
                            <span>Alored dono par</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-card">
                    <a href="">
                        <img src="img/portfolio/card2.jpg" alt="">
                        <div class="details">
                            <h4>Card 2</h4>
                            <span>Alored dono par</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-web">
                    <a href="">
                        <img src="img/portfolio/web3.jpg" alt="">
                        <div class="details">
                            <h4>Web 3</h4>
                            <span>Alored dono par</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-card">
                    <a href="">
                        <img src="img/portfolio/card3.jpg" alt="">
                        <div class="details">
                            <h4>Card 3</h4>
                            <span>Alored dono par</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                    <a href="">
                        <img src="img/portfolio/app2.jpg" alt="">
                        <div class="details">
                            <h4>App 2</h4>
                            <span>Alored dono par</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-logo">
                    <a href="">
                        <img src="img/portfolio/logo1.jpg" alt="">
                        <div class="details">
                            <h4>Logo 1</h4>
                            <span>Alored dono par</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-logo">
                    <a href="">
                        <img src="img/portfolio/logo3.jpg" alt="">
                        <div class="details">
                            <h4>Logo 3</h4>
                            <span>Alored dono par</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-web">
                    <a href="">
                        <img src="img/portfolio/web1.jpg" alt="">
                        <div class="details">
                            <h4>Web 1</h4>
                            <span>Alored dono par</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-logo">
                    <a href="">
                        <img src="img/portfolio/logo2.jpg" alt="">
                        <div class="details">
                            <h4>Logo 2</h4>
                            <span>Alored dono par</span>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </section><!-- #portfolio -->

    <!--==========================
      Team Section
    ============================-->
    <section id="team">
        <div class="container wow fadeInUp">
            <div class="section-header">
                <h3 class="section-title">Team</h3>
                <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
            </div>
            <div class="row">
                @foreach($guru as $val)
                    <div class="col-lg-3 col-md-6">
                        <div class="member">
                            <div class="pic"><img src="{{asset('public/galeri/foto/guru')}}/{{$val->foto}}" alt="{{asset('public/galeri/foto/guru')}}/{{$val->foto}}"></div>
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
        <div class="container wow fadeInUp">
            <div class="section-header">
                <h3 class="section-title">Contact</h3>
                <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
            </div>
        </div>

        <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>

        <div class="container wow fadeInUp">
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
                            <i class="fa fa-building"></i>
                            <p>{{$sekolah->didirikan}}</p>
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
                        <div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>
                        <form action="" method="post" role="form" class="contactForm">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- #contact -->

</main>
@endsection
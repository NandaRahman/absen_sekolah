<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Siakad SD Wonokusumo || {{ Request::segment(1) }}</title>

    <!-- Favicons -->
    <link href="{{asset("galeri/foto/logo.jpeg")}}" rel="icon">

    <!-- Bootstrap CSS File -->
    <link href="{{asset("theme/regna/lib/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{asset("theme/regna/lib/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet">
    <link href="{{asset("theme/regna/lib/animate/animate.min.css")}}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{asset("theme/regna/css/style.css")}}" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{asset('theme/sb-admin/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

    <!-- Custom CSS File -->
    <link href="{{asset("css/custom.css")}}" rel="stylesheet">

    <!-- JavaScript Libraries -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyD5FyJppfgYyWXDaH-fd_77bt23DEKLwG4"></script>

    <script src="{{asset("theme/regna/lib/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("theme/regna/lib/jquery/jquery-migrate.min.js")}}"></script>
    <script src="{{asset("theme/regna/lib/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("theme/regna/lib/easing/easing.min.js")}}"></script>
    <script src="{{asset("theme/regna/lib/wow/wow.min.js")}}"></script>

    <script src="{{asset("theme/regna/lib/waypoints/waypoints.min.js")}}"></script>
    <script src="{{asset("theme/regna/lib/counterup/counterup.min.js")}}"></script>
    <script src="{{asset("theme/regna/lib/superfish/hoverIntent.js")}}"></script>
    <script src="{{asset("theme/regna/lib/superfish/superfish.min.js")}}"></script>

    <!-- Contact Form JavaScript File -->
    <script src="{{asset("theme/regna/contactform/contactform.js")}}"></script>

    <!-- Template Main Javascript File -->
    <script src="{{asset("theme/regna/js/main.js")}}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{asset("js/custom.js")}}"></script>

    <!-- =======================================================
      Theme Name: Regna
      Theme URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
      Author: BootstrapMade.com
      License: https://bootstrapmade.com/license/
    ======================================================= -->
</head>
<body>

<!--==========================
Header
============================-->
<header id="header">
    <div class="container">

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li @if(Request::segment(1) == "welcome") class="menu-active" @endif><a href="{{route("welcome")}}">Home</a></li>
                <li  @if(Request::segment(1) == "sekolah") class="menu-has-children menu-active"  @else  class="menu-has-children" @endif><a style="color: white; cursor: pointer">Sekolah</a>
                    <ul>
                        <li><a href="{{route("pendaftaran")}}">Pendaftaran Sekolah</a></li>
                        <li><a href="{{route("pengumuman")}}">Info & Pengumuman</a></li>
                        <li><a href="{{route("saran")}}">Masukan Saran</a></li>
                    </ul>
                </li>
                <li><a href="{{route("login")}}">Login</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->

@yield('content')

<!--==========================
    Footer
  ============================-->
<footer id="footer">
    <div class="footer-top">
        <div class="container">

        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>Regna</strong>. All Rights Reserved
        </div>
    </div>
</footer><!-- #footer -->

<div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="loader"></div>
                <div class="loader-txt">
                    <p>Mohon tunggu beberapa saat.. <br><br><small>Kami sedang memproses perintah anda... #love</small></p>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


</body>
</html>

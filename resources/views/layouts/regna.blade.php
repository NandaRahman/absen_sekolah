<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Siakad SD Wonokusumo || {{ Request::segment(1) }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{asset("galeri/foto/logo.jpeg")}}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{asset("theme/regna/lib/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{asset("theme/regna/lib/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet">
    <link href="{{asset("theme/regna/lib/animate/animate.min.css")}}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{asset("theme/regna/css/style.css")}}" rel="stylesheet">
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyD5FyJppfgYyWXDaH-fd_77bt23DEKLwG4"></script>

    <!-- DataTables CSS -->
    <link href="{{asset('theme/sb-admin/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">

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
    <script src="{{asset('theme/sb-admin/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('theme/sb-admin/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('theme/sb-admin/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>

    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .loader {
            position: relative;
            text-align: center;
            margin: 15px auto 35px auto;
            z-index: 9999;
            display: block;
            width: 80px;
            height: 80px;
            border: 10px solid rgba(0, 0, 0, .3);
            border-radius: 50%;
            border-top-color: #000;
            animation: spin 1s ease-in-out infinite;
            -webkit-animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                -webkit-transform: rotate(360deg);
            }
        }

        @-webkit-keyframes spin {
            to {
                -webkit-transform: rotate(360deg);
            }
        }

        .table-borderless td,
        .table-borderless th {
            border: 0;
        }

        /** MODAL STYLING **/

        .modal-content {
            border-radius: 0px;
            box-shadow: 0 0 20px 8px rgba(0, 0, 0, 0.7);
        }

        .modal-backdrop.show {
            opacity: 0.75;
        }

        .loader-txt > p {
            font-size: 13px;
            color: #666;
        }
        .loader-txt > p > small{
            font-size: 11.5px;
            color: #999;
        }

    </style>
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
                    </ul>
                </li>
                <li class="menu-has-children"><a style="color: white; cursor: pointer">Login</a>
                    <ul>
                        <li><a href="{{route("login")}}">Guru Pengajar</a></li>
                    </ul>
                </li>
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
        <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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

<script src="{{asset("js/custom.js")}}"></script>

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
</body>
</html>

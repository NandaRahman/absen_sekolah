<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name', 'Absen') }}</title>
    <!-- Favicons -->
    <link href="{{asset("public/galeri/foto/logo.jpeg")}}" rel="icon">

    <link href="{{asset('public/theme/sb-admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('public/theme/sb-admin/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('public/theme/sb-admin/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('public/theme/sb-admin/vendor/morrisjs/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('public/theme/sb-admin/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('public/css/chosen.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/jquery.paginate.min.css')}}">

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">

    <!-- DataTables CSS -->
    <link href="{{asset('public/theme/sb-admin/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('public/theme/sb-admin/vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">

    <script src="{{asset('public/theme/sb-admin/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('public/theme/sb-admin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('public/theme/sb-admin/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{asset('public/theme/sb-admin/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/theme/sb-admin/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('public/theme/sb-admin/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('public/theme/sb-admin/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('public/theme/sb-admin/vendor/morrisjs/morris.min.js')}}"></script>
    <script src="{{asset('public/theme/sb-admin/data/morris-data.js')}}"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="{{asset('theme')}}"></script>


</head>
<body>
<main style="height: 100%">
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{asset('home')}}">Siakad SD Wonokusumo</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li>
                    <a class="dropdown-item" href="{{ route('logout',csrf_token()) }}"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i>
                        Logout, {{{ isset(Auth::user()->email) ? Auth::user()->email : "User" }}}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href="{{route('home')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                        @role('admin')
                        <li><a href="{{route('admin.sekolah')}}"><i class="fa fa-institution fa-fw"></i> Sekolah</a></li>
                        <li><a href="{{route('admin.absensi')}}"><i class="fa fa-list-alt fa-fw"></i> Absensi</a></li>
                        <li><a href="{{route('admin.kelas')}}"><i class="fa fa-balance-scale fa-fw"></i> Kelas</a></li>
                        <li><a href="{{route('admin.guru')}}"><i class="fa fa-graduation-cap fa-fw"></i> Guru</a></li>
                        <li><a href="{{route('admin.siswa')}}"><i class="fa fa-child fa-fw"></i> Siswa</a></li>
                        <li><a href="{{route('admin.penerimaan')}}"><i class="fa fa-newspaper-o fa-fw"></i> Penerimaan</a></li>
                        @endrole
                        @role('user')
                        <li><a href="{{route('user.absen')}}"><i class="fa fa-paperclip fa-fw"></i> Absen</a></li>
                        <li><a href="{{route('user.laporan')}}"><i class="fa fa-edit fa-fw"></i> Laporan</a></li>
                        @endrole
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            @if(session('status'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                    </button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    {{session('status')}}
                </div>
            @endif
            {{--<div class="container">--}}
            @yield('content')
            {{--</div>--}}
        </div>
    </div>
    <script src="{{asset("public/js/custom.js")}}"></script>
    <style>
        .dataTables_filter, .dataTables_grouping { display: none; }
    </style>

</main>
</body>
</html>

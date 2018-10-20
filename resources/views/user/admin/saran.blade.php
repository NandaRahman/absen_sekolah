@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Saran</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Pengumuman
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="mytable">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Saran</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($saran))
                            <?php $i=0; ?>
                            @foreach($saran as $val)
                                <tr class="odd gradeX">
                                    <td>{{++$i}}</td>
                                    <td>{{$val->nama}}</td>
                                    <td>{{$val->saran}}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger"><a href="{{route('admin.saran.delete',["id"=>$val->id])}}"><i class="fa fa-trash" style="color: white"></i></a></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable({
                ordering:false,
                sScrollX: "100%",
                bScrollCollapse: true
            });
        });
    </script>
    <style>
        .dataTables_filter, .dataTables_grouping { display: none; }
    </style>
@endsection

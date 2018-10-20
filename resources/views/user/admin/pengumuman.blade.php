@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Pengumuman</h1>
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
                            <th>Judul</th>
                            <th>Pengumuman</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($pengumuman))
                            <?php $i=0; ?>
                            @foreach($pengumuman as $val)
                                <tr class="odd gradeX">
                                    <td>{{++$i}}</td>
                                    <td>{{$val->judul}}</td>
                                    <td>{{$val->pengumuman}}</td>
                                    <td>
                                        <button type="button"  data-toggle="modal" data-target="#detail-{{$val->id}}" class="btn btn-success"><i class="fa fa-eye"></i></button>
                                        <button type="button" class="btn btn-danger"><a href="{{route('admin.pengumuman.delete',["id"=>$val->id])}}"><i class="fa fa-trash" style="color: white"></i></a></button>
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
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambah
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form action="{{route('admin.pengumuman.store')}}" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="judul">Judul</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" required><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="pengumuman">Pengumuman</label>
                            <div class="col-sm-12">
                                <textarea type="text" class="form-control" name="pengumuman" id="pengumuman" placeholder="Pengumuman" required></textarea><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="form-control btn btn-primary " type="submit">Masukan Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(!empty($pengumuman))
        @foreach($pengumuman as $val)
            <div class="modal fade" id="detail-{{$val->id}}" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Data Pengumuman</h5>
                        </div>
                        <div class="modal-body" id="content">
                            <div class="row">
                                <form id="update-{{$val->id}}" action="{{route('admin.pengumuman.update')}}" method="post">
                                    <input type="hidden" class="form-control" name="id" value="{{$val->id}}">
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="judul">Judul</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" required value="{{$val->judul}}"><br>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-12" for="pengumuman">Pengumuman</label>
                                        <div class="col-sm-12">
                                            <textarea type="text" class="form-control" name="pengumuman" id="pengumuman" placeholder="Pengumuman" required>{{$val->pengumuman}}</textarea><br>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" form="update-{{$val->id}}" class="btn btn-warning"><i class="fa fa-edit" style="color: white"></i> Ubah Data </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

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

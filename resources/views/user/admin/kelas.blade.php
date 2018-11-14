@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Kelas</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Kelas
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="mytable">

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Keterangan</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($kelas))
                            @foreach($kelas as $val)
                                <tr class="odd gradeX">
                                    <td>{{$val->kelas}}</td>
                                    <td>
                                        <select class="form-control col-11" onchange="update(this,'{{$val->id}}')" name="guru">
                                            <option>-- Tidak Ada --</option>
                                        @foreach($guru as $dat)
                                            <option value="{{$dat->id}}" @if(isset($val->getRelation('guru')->id)) @if($val->getRelation('guru')->id == $dat->id) selected @endif @endif >{{$dat->getRelation('user')->nama}}</option>
                                        @endforeach
                                        </select>
                                    <td>{{$val->keterangan}}</td>
                                    <td>

                                        <button type="button" class="btn btn-primary"><a style="color: white; text-decoration: none" href="{{route('admin.kelas.hapus',["id"=>$val->id])}}">Hapus</a></button>
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
                    <form action="{{route('admin.kelas')}}" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="wali_kelas">Wali Kelas</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="wali_kelas" id="wali_kelas">
                                    <option>-- Pilih Wali Kelas --</option>
                                    @if(!empty($wali_kelas))
                                        @foreach($wali_kelas as $val)
                                            <option value="{{$val->id}}">{{$val->getRelation('user')->nama}}</option>
                                        @endforeach
                                    @endif
                                </select><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="kelas">Kelas</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control four-input" name="kelas" id="kelas" placeholder="Masukan Kelas" required><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-12" for="keterangan">Keterangan</label>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required></textarea><br>
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

    <script>
        $("#dialog").dialog({
            autoOpen: false,
            show: {
                effect: "blind",
                duration: 1000
            },
            hide: {
                effect: "explode",
                duration: 1000
            }
        });
        function update(data, id) {
            var formData = new FormData();
            formData.append("guru",data.value);
            formData.append("id",id);
            $("#loadMe").modal({
                backdrop: "static", //remove ability to close modal with click
                keyboard: false //remove option to close with keyboard
            });
            $.ajax({
                url: "{{route('admin.kelas.update')}}",
                type: 'POST',
                data: formData,
                success:function(data){
                    $("#loadMe").modal("hide");
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
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

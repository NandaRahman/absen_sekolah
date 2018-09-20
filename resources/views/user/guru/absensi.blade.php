@extends('layouts.master')

@section('content')
    @if(empty($absen) && $already == false)
        <div class="container-fluid">
            <div class="text-center" style="height: 500px; margin-top: 200px;">
                <div class="col-sm-12">
                    <h1>Buka Absen</h1>
                    <p>Sistem absensi terbaru berbasis online<br> pada SD Wonokusumo</p>
                    <a href="{{route('user.absen.buka')}}" class="btn btn-default btn-lg js-scroll-trigger">
                        <span><i class="fa fa-pencil-square-o animated"></i> Buka Absen</span>
                    </a>
                </div>
            </div>
        </div>
    @elseif(isset($already) && $already)
        <div class="container-fluid">
            <div class="text-center" style="height: 500px; margin-top: 200px;">
                <div class="col-sm-12">
                    <h1>Sudah Melakukan Absen Hari Ini</h1>
                    <p>Sistem absensi terbaru berbasis online<br> pada SD Wonokusumo</p>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Siswa</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Guru
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($absen)
                                <?php $i=0;?>
                                @foreach($absen as $val)
                                   <tr>
                                       <td>{{++$i}}</td>
                                       <td>{{$val->getRelation('siswa')->nama}}</td>
                                       <td>
                                           <select class="form-control" name="status" onchange="update('{{$val->id}}',this)">
                                               @if(!empty($status))
                                                   @foreach($status as $sta)
                                                       <option value="{{$sta->id}}" @if($sta->id == $val->status) selected @endif>{{$sta->status}}</option>
                                                   @endforeach
                                               @endif
                                           </select>
                                       </td>
                                   </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <div class="col-12 btn-group"  style="float: right !important;">
                            <a href="{{route("user.absen.tutup")}}"><button class="btn btn-danger right">Tutup Absen</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <script>
        function update(id, data){
            var formData = new FormData();
            formData.append("id",id);
            formData.append("status",data.value);
            $.ajax({
                url: "{{route('user.absen.update')}}",
                type: 'POST',
                data: formData,
                success:function(res){
                    alert("success : "+res.status)
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    </script>
@endsection

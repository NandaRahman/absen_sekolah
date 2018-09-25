@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Rekap</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">

        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Grafik
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <div id="container"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6" id="table-content">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tabel
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row" id="row">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        var chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container'
            },
            yAxis: [{
                min: 0,
                allowDecimals: false,
                title: {
                    text: null
                }}],
            xAxis: [{
                type: "datetime",
                labels: {
                    formatter: function() {
                        return Highcharts.dateFormat("%b %e", this.value)
                    }
                }
            }],

            rangeSelector: {
                selected: 1
            },
            scrollbar: {
                enabled:true,
                barBackgroundColor: 'gray',
                barBorderRadius: 7,
                barBorderWidth: 0,
                buttonBackgroundColor: 'gray',
                buttonBorderWidth: 0,
                buttonBorderRadius: 7,
                trackBackgroundColor: 'none',
                trackBorderWidth: 1,
                trackBorderRadius: 8,
                trackBorderColor: '#CCC'
            },
            plotOptions:{
                series:{
                    allowPointSelect: true,
                    point:{
                        events:{
                            click: function(){
                                var formData = new FormData();
                                formData.append('data',this.category);
                                console.log(this.category);
                                $.ajax({
                                    url: "{{route('admin.absensi.data')}}",
                                    type: 'POST',
                                    data: formData,
                                    success:function(data){
                                        $('#table-content').show();
                                        document.getElementById("row").innerHTML=data;
                                        $('#table').DataTable({
                                            bScrollCollapse: true,
                                            initComplete: function() {
                                                var data = this.api().column(4);
                                                var menu = $('<select class="form-control filter-menu"><option value="">-- Kelas --</option></select>')
                                                    .appendTo('#kelas')
                                                    .on('change', function() {
                                                        var val = $(this).val();
                                                        data.search(val ? '^' + $(this).val() + '$' : val, true, false).draw();
                                                    });
                                                data.data().unique().sort().each(function(d, j) {
                                                    menu.append('<option value="' + d + '">' + d + '</option>');
                                                });
                                            }
                                        });
                                    },
                                    cache: false,
                                    contentType: false,
                                    processData: false
                                });

                            }
                        }
                    }
                }
            },

        });

        $(document).ready(function(){
            $('#table-content').hide();
            $.get("{{route('admin.absensi.grafik')}}",function (data, status) {
                console.log(Array.from(data.alpha[0]));
                chart.addSeries({
                    name: "Alpha",
                    data: data.alpha[0]
                });
                chart.addSeries({
                    name: "Hadir",
                    data: data.hadir[0]
                });
                chart.addSeries({
                    name: "Sakit",
                    data: data.sakit[0]
                });
                chart.addSeries({
                    name: "Ijin",
                    data: data.ijin[0]
                });
            });
        });

    </script>
@endsection

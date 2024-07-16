@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">List Data Alumni</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
                DataTables documentation</a>.</p>

        @if (session('success'))
            <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger border-left-danger" role="alert">
                <ul class="pl-4 my-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="prodi" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Jenjang Pendidikan</h6>
            </div>
            <div class="card-body">
                <div id="jenjang" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Jenis Kelamin</h6>
            </div>
            <div class="card-body">
                <div id="jenis-kelamin" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Agama</h6>
            </div>
            <div class="card-body">
                <div id="agama" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Angkatan</h6>
            </div>
            <div class="card-body">
                <div id="tahun-masuk" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Lulusan</h6>
            </div>
            <div class="card-body">
                <div id="tahun-lulus" style="width: 100%;height:400px;"></div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.5.1/dist/echarts.min.js"
        integrity="sha256-6EJwvQzVvfYP78JtAMKjkcsugfTSanqe4WGFpUdzo88=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script type="text/javascript">
        $.ajax({
            url: 'alumni-chart',
            type: 'GET',
            beforeSend: function() {},
            success: function(res) {
                console.log(res);

        // Initialize the echarts instance based on the prepared dom
        var prodiChart = echarts.init(document.getElementById('prodi'));
        var jenjangChart = echarts.init(document.getElementById('jenjang'));
        var jenisKelaminChart = echarts.init(document.getElementById('jenis-kelamin'));
        var agamaChart = echarts.init(document.getElementById('agama'));
        var tahunMasukChart = echarts.init(document.getElementById('tahun-masuk'));
        var tahunLulusChart = echarts.init(document.getElementById('tahun-lulus'));

        // Specify the configuration items and data for the chart
        var prodiOption = {
            title: {
                text: 'Jumlah Alumni Berdasarkan Program Studi'
            },
            dataset:{
                dimensions: ['prodi','jml_prodi'],
                source: res.prodi
            },
            tooltip:{
                show:true
            },
            series: [{
                name: 'Prodi',
                type: 'pie',
            }]
        };

        var jenjangOption = {
            title: {
                text: 'Jumlah Alumni Berdasarkan Jenjang Pendidikan'
            },
            dataset:{
                dimensions: ['jenjang','jml_jenjang'],
                source: res.jenjang
            },
            tooltip:{
                show:true
            },
            series: [{
                name: 'Jenjang',
                type: 'pie',
            }]
        };

        var jenisKelaminOption = {
            title: {
                text: 'Jumlah Alumni Berdasarkan Jenis Kelamin'
            },
            dataset:{
                dimensions: ['jenis_kelamin','jml_jenis_kelamin'],
                source: res.jenis_kelamin
            },
            tooltip:{
                show:true
            },
            series: [{
                name: 'Jenis Kelamin',
                type: 'pie',
            }]
        };

        var agamaOption = {
            title: {
                text: 'Jumlah Alumni Berdasarkan Agama'
            },
            dataset:{
                dimensions: ['agama','jml_agama'],
                source: res.agama
            },
            tooltip:{
                show:true
            },
            series: [{
                name: 'Agama',
                type: 'pie',
            }]
        };

        var tahunMasukOption = {
            title: {
                text: 'Jumlah Alumni Berdasarkan Angkatan'
            },
            dataset:{
                dimensions: ['tahun_masuk','jml_tahun_masuk'],
                source: res.tahun_masuk
            },
            tooltip:{
                show:true
            },
            series: [{
                name: 'Tahun Masuk',
                type: 'pie',
                itemStyle: {
                    color: function (param) {
                        var colors = ['red','violet']
                        return colors[param.dataIndex]
                    }
                }
            }]
        };

        var tahunLulusOption = {
            title: {
                text: 'Jumlah Alumni Berdasarkan Lulusan'
            },
            dataset:{
                dimensions: ['tahun_lulus','jml_tahun_lulus'],
                source: res.tahun_lulus
            },
            tooltip:{
                show:true
            },
            series: [{
                name: 'Tahun Lulus',
                type: 'pie',
            }]
        };

        // Display the chart using the configuration items and data just specified.
        prodiChart.setOption(prodiOption);
        jenjangChart.setOption(jenjangOption);
        jenisKelaminChart.setOption(jenisKelaminOption);
        agamaChart.setOption(agamaOption);
        tahunMasukChart.setOption(tahunMasukOption);
        tahunLulusChart.setOption(tahunLulusOption);
            },
            error: function(error) {
                console.error(error);
            }
        })


    </script>
@endsection

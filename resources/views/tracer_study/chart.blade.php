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
                <div id="status" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="methodology" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="every-methodology" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="job-position-0" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="job-position-1" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="job-position-2" style="width: 100%;height:400px;"></div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.5.1/dist/echarts.min.js"
        integrity="sha256-6EJwvQzVvfYP78JtAMKjkcsugfTSanqe4WGFpUdzo88=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        var workStatus = @json($workStatus);
        var {
            ALUMNI,
            ...averageMethod
        } = @json($averageMethod);
        var lectureScore = @json($lectureScore);
        var demoScore = @json($demoScore);
        var projectScore = @json($projectScore);
        var internScore = @json($internScore);
        var praticalScore = @json($praticalScore);
        var fieldScore = @json($fieldScore);
        var discussionScore = @json($discussionScore);
        var positionData = @json($jobPosition);

        // Initialize the echarts instance based on the prepared dom
        var prodiChart = echarts.init(document.getElementById('status'));
        var methodChart = echarts.init(document.getElementById('methodology'));
        var everyMethodChart = echarts.init(document.getElementById('every-methodology'));
        var positionChart = []

        positionChart = [
            echarts.init(document.getElementById('job-position-0')),
            echarts.init(document.getElementById('job-position-1')),
            echarts.init(document.getElementById('job-position-2'))
        ];

        // Specify the configuration items and data for the chart
        var prodiOption = {
            title: {
                text: 'Status Alumni'
            },
            dataset: {
                dimensions: ['STATUS', 'JUMLAH'],
                source: workStatus
            },
            tooltip: {
                show: true
            },
            series: [{
                name: 'Status Alumni',
                type: 'pie',
            }]
        };

        var methodOption = {
            title: {
                text: 'Rata - Rata Penilaian Methodologi Pengajaran (Round Up)',
                subtext: 'Jumlah Responden: ' + ALUMNI
            },
            tooltip: {
                show: true
            },
            legend: {
                show: true,
                right: 20
            },
            xAxis: {
                type: 'category',
                data: Object.keys(averageMethod)
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                name: 'Methodology',
                type: 'bar',
                data: Object.values(averageMethod)
            }]
        };

        var everyMethodOption = {
            title: {
                text: 'Penilaian Methodologi Pengajaran',
                subtext: 'Jumlah Responden: ' + ALUMNI
            },
            tooltip: {
                show: true
            },
            legend: {
                show: true,
                right: 20
            },
            dataset: [{
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: lectureScore
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: demoScore
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: projectScore
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: internScore
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: praticalScore
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: fieldScore
                },
                {
                    dimensions: ['SCORE', 'JUMLAH'],
                    source: discussionScore
                },
            ],
            xAxis: {
                type: 'category'
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                    name: 'Lecture',
                    type: 'bar',
                    datasetIndex: 0
                },
                {
                    name: 'Demo',
                    type: 'bar',
                    datasetIndex: 1
                },
                {
                    name: 'Project',
                    type: 'bar',
                    datasetIndex: 2
                },
                {
                    name: 'Internship',
                    type: 'bar',
                    datasetIndex: 3
                },
                {
                    name: 'Pratical',
                    type: 'bar',
                    datasetIndex: 4
                },
                {
                    name: 'Field',
                    type: 'bar',
                    datasetIndex: 5
                },
                {
                    name: 'Discussion',
                    type: 'bar',
                    datasetIndex: 6
                },
            ]
        };

        var positionOption = []

        positionOption[0] = {
            title: {
                text: 'Jabatan Alumni',
                subtext: 'Jumlah Responden: ' + ALUMNI
            },
            dataset: {
                dimensions: ['POSITION', 'JUMLAH'],
                source: positionData
            },
            legend: {
                show: true,
                right: 20
            },
            tooltip: {
                show: true
            },
            series: [{
                name: 'Jabatan Alumni',
                type: 'pie',
            }]
        };

        positionOption[1] = {
            title: {
                text: 'Rata-rata Upah Alumni per Jabatan',
                subtext: 'Jumlah Responden: ' + ALUMNI
            },
            tooltip: {
                show: true
            },
            legend: {
                show: true,
                right: 20
            },
            dataset: [{
                dimensions: [
                    'POSITION',
                    "AVG_SALARY",
                ],
                source: positionData
            }, ],
            xAxis: {
                type: 'category'
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                name: 'Upah (Rupiah)',
                type: 'bar',
            }, ]
        };

        positionOption[2] = {
            title: {
                text: 'Rata-rata Alumni Mencari Pekerjaan',
                subtext: 'Jumlah Responden: ' + ALUMNI
            },
            tooltip: {
                show: true
            },
            legend: {
                show: true,
                right: 20
            },
            dataset: [{
                dimensions: [
                    'POSITION',
                    "AVG_JOB_ACQUIRED",
                    "AVG_APPLICATION",
                    "AVG_COMPANY_INTERVIEWED",
                    "AVG_COMPANY_RESPONDED",
                ],
                source: positionData
            }, ],
            xAxis: {
                type: 'category'
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                name: 'Lama Diterima (bulan)',
                type: 'bar',
            },
            {
                name: 'Jumlah Melamar',
                type: 'bar',
            },
            {
                name: 'Jumlah Wawancara',
                type: 'bar',
            },
            {
                name: 'Jumlah Follow Up',
                type: 'bar',
            },
         ]
        };

        // Display the chart using the configuration items and data just specified.
        prodiChart.setOption(prodiOption);
        methodChart.setOption(methodOption);
        everyMethodChart.setOption(everyMethodOption);
        positionChart.forEach((element, index) => {
            element.setOption(positionOption[index]);
        });
    </script>
@endsection

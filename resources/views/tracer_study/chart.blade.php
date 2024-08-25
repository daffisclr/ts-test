@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">

        <!-- Page Heading -->

        @if (auth()->user()->role == 'Admin')
        <h1 class="h3 mb-2 text-gray-800">Hasil Kuesioner Tracer Study</h1>
        <a href="{{ route('alumni.excel') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Excel
        </a>
        <br>
        <hr>
        @endif

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
                <h6 class="m-0 font-weight-bold text-primary">Status Alumni JTIK Saat Ini</h6>
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

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="company-type" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="education" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="compatibility" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="work-hunt" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="competency-work" style="width: 100%;height:400px;"></div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Alumni Berdasarkan Program Studi</h6>
            </div>
            <div class="card-body">
                <div id="competency-graduation" style="width: 100%;height:400px;"></div>
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
        var methodPercent = @json($methodPercent);
        var {
            ALUMNI,
            ...averageMethod
        } = @json($averageMethod);
        var positionData = @json($jobPosition);
        var companyTypeData = @json($company_type);
        var companyLevelData = @json($company_level);
        var educationLocation = @json($education_location);
        var educationPayment = @json($education_payment);
        var educationReason = @json($education_reason);
        var workCompatibility = @json($work_compatibility);
        var workHunt = @json($work_hunt);
        var {
            work,
            graduation
        } = @json($competency_data);

        // Initialize the echarts instance based on the prepared dom
        var prodiChart = echarts.init(document.getElementById('status'));
        var methodChart = echarts.init(document.getElementById('methodology'));
        var positionChart = []

        positionChart = [
            echarts.init(document.getElementById('job-position-0')),
            echarts.init(document.getElementById('job-position-1')),
            echarts.init(document.getElementById('job-position-2'))
        ];
        var companyTypeChart = echarts.init(document.getElementById('company-type'));
        var educationChart = echarts.init(document.getElementById('education'));
        var compatibilityChart = echarts.init(document.getElementById('compatibility'));
        var workHuntChart = echarts.init(document.getElementById('work-hunt'));
        var competencyWorkChart = echarts.init(document.getElementById('competency-work'));
        var competencyGraduationChart = echarts.init(document.getElementById('competency-graduation'));

        // Specify the configuration items and data for the chart
        var prodiOption = {
            title: {
                text: 'Status Alumni Saat Ini'
            },
            dataset: {
                dimensions: ['STATUS', 'JUMLAH'],
                source: workStatus
            },
            legend: {
                orient: 'vertical',
                show: true,
                right: 20
            },
            tooltip: {
                show: true,
                formatter: (data) => {
                    let format = `<span>${data.seriesName}</span>
                                            <br />
                                            <div>${data.marker} ${data.name} : ${data.percent} %</div>`;

                    return format;
                }
            },
            series: [{
                name: 'Status Alumni',
                type: 'pie',
            }]
        };

        var methodOption = {
            title: {
                text: 'Penilaian Methodologi Pengajaran',
                subtext: 'Jumlah Responden: ' + ALUMNI
            },
            tooltip: {
                show: true,
                trigger: "axis",
                formatter: (data) => {
                    let format = `<span>${data[0].name}</span><br />`;

                    data.forEach(element => {
                        format +=
                            `<div>${element.marker} ${element.seriesName} : ${element.value[element.seriesName]} %</div>`
                    });

                    return format;
                }
            },
            legend: {
                orient: 'vertical',
                show: true,
                right: 20,
                top: 25,
                data: [
                    "Sangat Besar",
                    "Besar",
                    "Cukup Besar",
                    "Kurang",
                    "Tidak Sama Sekali",
                ]
            },
            dataset: {
                dimensions: [
                    "Category",
                    "Sangat Besar",
                    "Besar",
                    "Cukup Besar",
                    "Kurang",
                    "Tidak Sama Sekali",
                ],
                source: methodPercent
            },
            xAxis: {
                type: 'category',
                name: 'Category'
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                    name: "Sangat Besar",
                    type: 'bar'
                },
                {
                    name: "Besar",
                    type: 'bar'
                },
                {
                    name: "Cukup Besar",
                    type: 'bar'
                },
                {
                    name: "Kurang",
                    type: 'bar'
                },
                {
                    name: "Tidak Sama Sekali",
                    type: 'bar'
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
                orient: 'vertical',
                show: true,
                right: 20
            },
            tooltip: {
                show: true,
                formatter: (data) => {
                    let format = `<span>${data.seriesName}</span>
                                            <br />
                                            <div>${data.marker} ${data.name} : ${data.percent} %</div>`;

                    return format;
                }
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
                orient: 'vertical',
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
                orient: 'vertical',
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

        var companyTypeOption = {
            title: {
                text: 'Jumlah Alumni yang Bekerja',
                left: 'center'
            },
            dataset: [{
                dimensions: ['COMPANY_TYPE', 'JUMLAH'],
                source: companyTypeData
            }, {
                dimensions: ['COMPANY_LEVEL', 'JUMLAH'],
                source: companyLevelData
            }, ],
            tooltip: {
                show: true,
                formatter: (data) => {
                    let format = `<span>${data.seriesName}</span>
                                            <br />
                                            <div>${data.marker} ${data.name} : ${data.percent} %</div>`;

                    return format;
                }
            },
            series: [{
                    name: 'Jumlah Alumni Bekerja Berdasarkan Tipe Perusahaan',
                    type: 'pie',
                    center: ['25%', '50%'],
                    label: {
                        formatter: function(params) {
                            if (params.name == 5 || params.name == "5") return 'Lainnya'
                            return params.name
                        }
                    },
                    datasetIndex: 0
                },
                {
                    name: 'Jumlah Alumni Bekerja Berdasarkan Tingkat Perusahaan',
                    type: 'pie',
                    center: ['75%', '50%'],
                    datasetIndex: 1
                }
            ]
        };

        var educationOption = {
            title: {
                text: 'Jumlah Alumni yang Melanjutkan Studi',
                left: 'center'
            },
            dataset: [{
                dimensions: ['LOCATION', 'JUMLAH'],
                source: educationLocation
            }, {
                dimensions: ['PAYMENT_TYPE', 'JUMLAH'],
                source: educationPayment
            }, {
                dimensions: ['REASONS', 'JUMLAH'],
                source: educationReason
            }, ],
            tooltip: {
                show: true,
                formatter: (data) => {
                    let format = `<span>${data.seriesName}</span>
                                            <br />
                                            <div>${data.marker} ${data.name} : ${data.percent} %</div>`;

                    return format;
                }
            },
            series: [{
                    name: 'Lokasi Studi Alumni',
                    type: 'pie',
                    center: ['20%', '50%'],
                    datasetIndex: 0
                },
                {
                    name: 'Pembiayaan Studi Alumni',
                    type: 'pie',
                    center: ['50%', '50%'],
                    datasetIndex: 1
                },
                {
                    name: 'Pembiayaan Studi Alumni',
                    type: 'pie',
                    center: ['80%', '50%'],
                    datasetIndex: 2
                }
            ]
        };

        var compatibilityOption = {
            title: {
                text: 'Jumlah Alumni dengan Pekerjaan yang Tidak Sesuai',
            },
            tooltip: {
                show: true,
                formatter: (data) => {
                    let format = `<span>${data.seriesName}</span>
                                            <br />
                                            <div>${data.marker} ${data.name} : ${data.percent} %</div>`;

                    return format;
                }
            },
            dataset: {
                dimensions: [
                    'COMPATIBILITY_TYPE',
                    "JUMLAH",
                ],
                source: workCompatibility
            },
            series: [{
                name: 'Kecocokan Pekerjaan',
                type: 'pie',
            }, ]
        };

        var workHuntOption = {
            title: {
                text: 'Jumlah Methode Pencarian Pekerjaan',
            },
            tooltip: {
                show: true,
                formatter: (data) => {
                    let format = `<span>${data.seriesName}</span>
                                            <br />
                                            <div>${data.marker} ${data.name} : ${data.percent} %</div>`;

                    return format;
                }
            },
            dataset: {
                dimensions: [
                    'JOB_HUNT_METHOD',
                    "JUMLAH",
                ],
                source: workHunt
            },
            series: [{
                name: 'Metode Pencarian',
                type: 'pie',
            }, ]
        };

        console.log(work, graduation);


        var competencyWorkOption = {
            title: {
                text: 'Penilaian Kompetensi Pada Pekerjaan',
                subtext: 'Jumlah Responden: ' + ALUMNI
            },
            tooltip: {
                show: true,
                trigger: "axis",
                formatter: (data) => {
                    let format = `<span>${data[0].name}</span><br />`;

                    data.forEach(element => {
                        format +=
                            `<div>${element.marker} ${element.seriesName} : ${element.value[element.seriesName]} %</div>`
                    });

                    return format;
                }
            },
            legend: {
                orient: 'vertical',
                show: true,
                right: 20,
                top: 25,
                data: [
                    "Sangat Rendah",
                    "Rendah",
                    "Cukup",
                    "Tinggi",
                    "Sangat Tinggi",
                ]
            },
            dataset: {
                dimensions: [
                    "Category",
                    "Sangat Rendah",
                    "Rendah",
                    "Cukup",
                    "Tinggi",
                    "Sangat Tinggi",
                ],
                source: work
            },
            xAxis: {
                type: 'category',
                name: 'Category'
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                    name: "Sangat Rendah",
                    type: 'bar'
                },
                {
                    name: "Rendah",
                    type: 'bar'
                },
                {
                    name: "Cukup",
                    type: 'bar'
                },
                {
                    name: "Tinggi",
                    type: 'bar'
                },
                {
                    name: "Sangat Tinggi",
                    type: 'bar'
                },
            ]
        };

        var competencyGraduationOption = {
            title: {
                text: 'Penilaian Kompetensi Pada Saat Lulus',
                subtext: 'Jumlah Responden: ' + ALUMNI
            },
            tooltip: {
                show: true,
                trigger: "axis",
                formatter: (data) => {
                    let format = `<span>${data[0].name}</span><br />`;

                    data.forEach(element => {
                        format +=
                            `<div>${element.marker} ${element.seriesName} : ${element.value[element.seriesName]} %</div>`
                    });

                    return format;
                }
            },
            legend: {
                orient: 'horizontal',
                show: true,
                right: 20,
                top: 25,
                data: [
                    "Sangat Rendah",
                    "Rendah",
                    "Cukup",
                    "Tinggi",
                    "Sangat Tinggi",
                ]
            },
            dataset: {
                dimensions: [
                    "Category",
                    "Sangat Rendah",
                    "Rendah",
                    "Cukup",
                    "Tinggi",
                    "Sangat Tinggi",
                ],
                source: graduation
            },
            xAxis: {
                type: 'category',
                name: 'Category'
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                    name: "Sangat Rendah",
                    type: 'bar'
                },
                {
                    name: "Rendah",
                    type: 'bar'
                },
                {
                    name: "Cukup",
                    type: 'bar'
                },
                {
                    name: "Tinggi",
                    type: 'bar'
                },
                {
                    name: "Sangat Tinggi",
                    type: 'bar'
                },
            ]
        };

        // Display the chart using the configuration items and data just specified.
        prodiChart.setOption(prodiOption);
        methodChart.setOption(methodOption);
        positionChart.forEach((element, index) => {
            element.setOption(positionOption[index]);
        });
        companyTypeChart.setOption(companyTypeOption);
        educationChart.setOption(educationOption);
        compatibilityChart.setOption(compatibilityOption);
        workHuntChart.setOption(workHuntOption);
        competencyWorkChart.setOption(competencyWorkOption);
        competencyGraduationChart.setOption(competencyGraduationOption);
    </script>
@endsection

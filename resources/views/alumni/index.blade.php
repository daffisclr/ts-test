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
                <h6 class="m-0 font-weight-bold text-primary">Data Alumni</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('alumni.pdf') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-download fa-sm text-white-50"></i> Generate PDF
                </a>
                <br>
                <hr>
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                    role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="No: activate to sort column descending" style="width: 110px;">
                                                No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Nama Alumni: activate to sort column ascending"
                                                style="width: 170px;">Nama Alumni</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="NIM: activate to sort column ascending"
                                                style="width: 77px;">NIM</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Prodi: activate to sort column ascending"
                                                style="width: 31px;">Prodi</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Jenjang: activate to sort column ascending"
                                                style="width: 75px;">Jenjang</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Tahun Lulus: activate to sort column ascending"
                                                style="width: 67px;">Angkatan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Tahun Lulus: activate to sort column ascending"
                                                style="width: 67px;">Lulusan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Tahun Lulus: activate to sort column ascending"
                                                style="width: 67px;">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($data as $data)
                                        <tbody>
                                            <tr class="odd">
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->username }}</td>
                                                <td>{{ $data->alumni != null ? $data->alumni->prodi : '-' }}</td>
                                                <td>{{ $data->alumni != null ? $data->alumni->jenjang : '-' }}</td>
                                                <td>{{ $data->alumni != null ? $data->alumni->tahun_masuk : '-' }}</td>
                                                <td>{{ $data->alumni != null ? $data->alumni->tahun_lulus : '-' }}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#modal-detail-{{ $data->id }}">
                                                        <i class="fas fa-eye"></i>
                                                    </button>

                                                    <br>
                                                    {{-- Liat Histori Form Tracer Study --}}
                                                    <a class="btn btn-warning btn-sm" href="{{ URL::route('alumni.view_kuesioner', [$data->id]) }}">
                                                        <i class="fa-regular fa-clipboard"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <div class="modal fade" id="modal-detail-{{ $data->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ __('Data Alumni') }}</h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="mb-3">
                                                                <label for="lead_id" class="col-form-label">Nama
                                                                    Alumni:</label>
                                                                <input value="{{ $data->name }}" type="text"
                                                                    class="form-control" id="lead_id" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="lead_id" class="col-form-label">NIM
                                                                    Alumni:</label>
                                                                <input value="{{ $data->username }}" type="text"
                                                                    class="form-control" id="lead_id" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="lead_id" class="col-form-label">Email
                                                                    Alumni:</label>
                                                                <input value="{{ $data->email }}" type="text"
                                                                    class="form-control" id="lead_id" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="lead_id" class="col-form-label">Nomor Telpon
                                                                    Alumni:</label>
                                                                <input value="{{ $data->phone_number }}" type="text"
                                                                    class="form-control" id="lead_id" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="lead_id" class="col-form-label">Prodi
                                                                    Alumni:</label>
                                                                <input
                                                                    value="{{ $data->alumni != null ? $data->alumni->prodi : '-' }}"
                                                                    type="text" class="form-control" id="lead_id"
                                                                    readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="lead_id" class="col-form-label">Jenjang
                                                                    Alumni:</label>
                                                                <input
                                                                    value="{{ $data->alumni != null ? $data->alumni->jenjang : '-' }}"
                                                                    type="text" class="form-control" id="lead_id"
                                                                    readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="lead_id" class="col-form-label">Jenis Kelamin
                                                                    Alumni:</label>
                                                                <input
                                                                    value="{{ $data->alumni != null ? $data->alumni->jenis_kelamin : '-' }}"
                                                                    type="text" class="form-control" id="lead_id"
                                                                    readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="lead_id" class="col-form-label">Agama
                                                                    Alumni:</label>
                                                                <input
                                                                    value="{{ $data->alumni != null ? $data->alumni->agama : '-' }}"
                                                                    type="text" class="form-control" id="lead_id"
                                                                    readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="lead_id"
                                                                    class="col-form-label">Angkatan:</label>
                                                                <input
                                                                    value="{{ $data->alumni != null ? $data->alumni->tahun_masuk : '-' }}"
                                                                    type="text" class="form-control" id="lead_id"
                                                                    readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="lead_id"
                                                                    class="col-form-label">Lulusan:</label>
                                                                <input
                                                                    value="{{ $data->alumni != null ? $data->alumni->tahun_lulus : '-' }}"
                                                                    type="text" class="form-control" id="lead_id"
                                                                    readonly>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" type="button"
                                                            data-dismiss="modal">{{ __('Cancel') }}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">List Data Alumni</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
                DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Alumni</h6>
            </div>
            <div class="card-body">
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
                                                style="width: 67px;">Tahun Lulus</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Tahun Lulus: activate to sort column ascending"
                                                style="width: 67px;">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($data as $data)
                                        <tbody>
                                            <tr class="odd">
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->username }}</td>
                                                <td>{{ $data->alumni != null ? $data->alumni->prodi : '-' }}</td>
                                                <td>{{ $data->alumni != null ? $data->alumni->jenjang : '-' }}</td>
                                                <td>{{ $data->alumni != null ? $data->alumni->tahun_lulus : '-' }}</td>
                                            </tr>
                                        </tbody>
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

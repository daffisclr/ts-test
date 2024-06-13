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
                <h6 class="m-0 font-weight-bold text-primary">Data Pengguna Alumni</h6>
            </div>
            <div class="card-body">
                <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                                                style="width: 170px;">Nama Pengguna Alumni</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="NIM: activate to sort column ascending"
                                                style="width: 77px;">Email Pengguna Alumni</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Prodi: activate to sort column ascending"
                                                style="width: 31px;">Nomor Pengguna Alumni</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Jenjang: activate to sort column ascending"
                                                style="width: 75px;">Nama Instansi/Perusahaan/Lembaga</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Tahun Lulus: activate to sort column ascending"
                                                style="width: 67px;">Jabatan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Tahun Lulus: activate to sort column ascending"
                                                style="width: 67px;">Email Instansi/Perusahaan/Lembaga</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Tahun Lulus: activate to sort column ascending"
                                                style="width: 67px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($alumniusers as $alumniusers)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <th>{{ $alumniusers->name }}</th>
                                                <th>{{ $alumniusers->email }}</th>
                                                <th>{{ $alumniusers->phone }}</th>
                                                <th>{{ $alumniusers->company }}</th>
                                                <th>{{ $alumniusers->position }}</th>
                                                <th>{{ $alumniusers->company_contact }}</th>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengguna-alumni.destroy', $alumniusers->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger">
                                                Data Pengguna Alumni belum Tersedia.
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
@endpush

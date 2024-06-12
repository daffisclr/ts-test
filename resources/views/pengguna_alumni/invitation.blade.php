@extends('layouts.admin')

@section('main-content')
<div class="col-lg-12 order-lg-1">

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Invite Pengguna Alumni</h6>
        </div>

        <div class="card-body">

            <form method="POST" action="" autocomplete="off">
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group focused">
                                <label class="form-control-label" for="name">Nama Pengguna Alumni<span class="small text-danger">*</span></label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email Pengguna Alumni<span class="small text-danger">*</span></label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="example@example.com">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="phone_number">Nomor Telpon Pengguna Alumni<span class="small text-danger">*</span></label>
                                <input type="number" id="phone_number" class="form-control" name="phone_number" placeholder="Nomor Telpon Aktif">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group focused">
                                <label class="form-control-label" for="company">Nama Instansi/Perusahaan/Lembaga<span class="small text-danger">*</span></label>
                                <input type="text" id="company" class="form-control" name="company" placeholder="Nama Perusahaan atau Instansi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group focused">
                                <label class="form-control-label" for="status">Jabatan Pengguna Alumni<span class="small text-danger">*</span></label>
                                <input type="text" id="status" class="form-control" name="status" placeholder="ex: Manager atau Supervisor atau CEO">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group focused">
                                <label class="form-control-label" for="status">Email Instansi/Perusahaan/Lembaga<span class="small text-danger">*</span></label>
                                <input type="email" id="status" class="form-control" name="company_email" placeholder="ex: sample@gov.id atau sample@edu.ac.id">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button -->
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>

</div>
@endsection

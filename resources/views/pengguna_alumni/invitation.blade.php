@extends('layouts.admin')

@section('main-content')
<div class="col-lg-12 order-lg-1">

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Invite Pengguna Alumni</h6>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('pengguna-alumni.send') }}" autocomplete="off">
                @csrf
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group focused">
                                <label class="form-control-label" for="name">Nama Pengguna Alumni<span class="small text-danger">*</span></label>
                                <input value="{{ old('name') }}" type="text" id="name" class="form-control" name="name" placeholder="Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email Pengguna Alumni<span class="small text-danger">*</span></label>
                                <input value="{{ old('email') }}" type="email" id="email" class="form-control" name="email" placeholder="example@example.com">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="phone">Nomor Telpon Pengguna Alumni<span class="small text-danger">*</span></label>
                                <input value="{{ old('phone') }}" type="number" id="phone" class="form-control" name="phone" placeholder="Nomor Telpon Aktif">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group focused">
                                <label class="form-control-label" for="company">Nama Instansi/Perusahaan/Lembaga<span class="small text-danger">*</span></label>
                                <input value="{{ old('company') }}" type="text" id="company" class="form-control" name="company" placeholder="Nama Perusahaan atau Instansi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group focused">
                                <label class="form-control-label" for="position">Jabatan Pengguna Alumni<span class="small text-danger">*</span></label>
                                <input value="{{ old('position') }}" type="text" id="position" class="form-control" name="position" placeholder="ex: Manager atau Supervisor atau CEO">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group focused">
                                <label class="form-control-label" for="company_contact">Email Instansi/Perusahaan/Lembaga<span class="small text-danger">*</span></label>
                                <input value="{{ old('company_contact') }}" type="email" id="company_contact" class="form-control" name="company_contact" placeholder="ex: sample@gov.id atau sample@edu.ac.id">
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

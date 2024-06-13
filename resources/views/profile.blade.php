@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Profile') }}</h1>

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

    <div class="row">

        <div class="col-lg-4 order-lg-2">

            <div class="card shadow mb-4">
                <div class="card-profile-image mt-4">
                    <figure class="rounded-circle avatar avatar font-weight-bold"
                        style="font-size: 60px; height: 180px; width: 180px;" data-initial="{{ Auth::user()->name[0] }}">
                    </figure>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h5 class="font-weight-bold">{{ Auth::user()->name }}</h5>
                                <p>{{ Auth::user()->role }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-8 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">My Account</h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('profile.update') }}" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input type="hidden" name="_method" value="PUT">

                        <h6 class="heading-small text-muted mb-4">User information</h6>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Name<span
                                                class="small text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name"
                                            placeholder="Name" value="{{ old('name', Auth::user()->name) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Email address<span
                                                class="small text-danger">*</span></label>
                                        <input type="email" id="email" class="form-control" name="email"
                                            placeholder="example@example.com"
                                            value="{{ old('email', Auth::user()->email) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="username">NIM<span
                                                class="small text-danger">*</span></label>
                                        <input type="number" id="username" class="form-control" name="username"
                                            placeholder="Nomor Induk Siswa Alumni ex:461xxxxx"
                                            value="{{ old('username', Auth::user()->username) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="phone_number">Nomor Telpon<span
                                                class="small text-danger">*</span></label>
                                        <input type="number" id="phone_number" class="form-control" name="phone_number"
                                            placeholder="Nomor Telpon Aktif"
                                            value="{{ old('phone_number', Auth::user()->phone_number) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="current_password">Current password</label>
                                        <input type="password" id="current_password" class="form-control"
                                            name="current_password" placeholder="Current password">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="new_password">New password</label>
                                        <input type="password" id="new_password" class="form-control"
                                            name="new_password" placeholder="New password">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="confirm_password">Confirm password</label>
                                        <input type="password" id="confirm_password" class="form-control"
                                            name="password_confirmation" placeholder="Confirm password">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        @if (auth()->user()->role == 'Alumni')
                            <h6 class="heading-small text-muted mb-4">Alumni information</h6>

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="name">Prodi<span
                                                    class="small text-danger">*</span></label>
                                            <select type="option" class="form-control" id="prodi" name="prodi"
                                                required>
                                                <option value="Teknik Informatika"
                                                    {{ old('prodi') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->prodi == 'Teknik Informatika' ? 'selected' : '') : '') }}>
                                                    Teknik Informatika</option>
                                                <option value="Teknik Multimedia dan Jaringan"
                                                    {{ old('prodi') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->prodi == 'Teknik Multimedia dan Jaringan' ? 'selected' : '') : '') }}>
                                                    Teknik Multimedia dan Jaringan</option>
                                                <option value="Teknik Multimedia Digital"
                                                    {{ old('prodi') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->prodi == 'Teknik Multimedia Digital' ? 'selected' : '') : '') }}>
                                                    Teknik Multimedia Digital</option>
                                                <option value="Teknik Komputer dan Jaringan"
                                                    {{ old('prodi') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->prodi == 'Teknik Komputer dan Jaringan' ? 'selected' : '') : '') }}>
                                                    Teknik Komputer dan Jaringan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="name">Jenjang Alumni<span
                                                    class="small text-danger">*</span></label>
                                            <select type="option" class="form-control" id="jenjang" name="jenjang"
                                                required>
                                                <option value="D4"
                                                    {{ old('jenjang') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->jenjang == 'D4' ? 'selected' : '') : '') }}>
                                                    D4</option>
                                                <option value="D1"
                                                    {{ old('jenjang') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->jenjang == 'D1' ? 'selected' : '') : '') }}>
                                                    D1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="name">Jenis Kelamin<span
                                                    class="small text-danger">*</span></label>
                                            <select type="option" class="form-control" id="jenis_kelamin"
                                                name="jenis_kelamin" required>
                                                <option value="Laki-Laki"
                                                    {{ old('jenis_kelamin') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->jenis_kelamin == 'Laki-Laki' ? 'selected' : '') : '') }}>
                                                    Laki-Laki</option>
                                                <option
                                                    value="Perempuan"{{ old('jenis_kelamin') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->jenis_kelamin == 'Perempuan' ? 'selected' : '') : '') }}>
                                                    Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="name">Agama<span
                                                    class="small text-danger">*</span></label>
                                            <select type="option" class="form-control" id="agama" name="agama"
                                                required>
                                                <option value="Islam"
                                                    {{ old('agama') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->agama == 'Islam' ? 'selected' : '') : '') }}>
                                                    Islam</option>
                                                <option value="Kristen Protestan"
                                                    {{ old('agama') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->agama == 'Kristen Protestan' ? 'selected' : '') : '') }}>
                                                    Kristen Protestan</option>
                                                <option value="Kristen Katolik"
                                                    {{ old('agama') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->agama == 'Kristen Katolik' ? 'selected' : '') : '') }}>
                                                    Kristen Katolik</option>
                                                <option value="Hindu"
                                                    {{ old('agama') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->agama == 'Hindu' ? 'selected' : '') : '') }}>
                                                    Hindu</option>
                                                <option value="Buddha"
                                                    {{ old('agama') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->agama == 'Buddha' ? 'selected' : '') : '') }}>
                                                    Buddha</option>
                                                <option value="Konghuchu"
                                                    {{ old('agama') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->agama == 'Konghuchu' ? 'selected' : '') : '') }}>
                                                    Konghuchu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="name">Angkatan<span
                                                    class="small text-danger">*</span></label>
                                            <select type="option" class="form-control" id="tahun_masuk"
                                                name="tahun_masuk" required>
                                                <option value="2014"
                                                    {{ old('2014') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->tahun_masuk == '2014' ? 'selected' : '') : '') }}>
                                                    2014</option>
                                                <option value="2015"
                                                    {{ old('2015') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->tahun_masuk == '2015' ? 'selected' : '') : '') }}>
                                                    2015</option>
                                                <option value="2016"
                                                    {{ old('2016') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->tahun_masuk == '2016' ? 'selected' : '') : '') }}>
                                                    2016</option>
                                                <option value="2017"
                                                    {{ old('2017') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->tahun_masuk == '2017' ? 'selected' : '') : '') }}>
                                                    2017</option>
                                                <option value="2018"
                                                    {{ old('2018') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->tahun_masuk == '2018' ? 'selected' : '') : '') }}>
                                                    2018</option>
                                                <option value="2019"
                                                    {{ old('2019') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->tahun_masuk == '2019' ? 'selected' : '') : '') }}>
                                                    2019</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="name">Tahun Lulus<span
                                                    class="small text-danger">*</span></label>
                                            <select type="option" class="form-control" id="tahun_lulus"
                                                name="tahun_lulus" required>
                                                <option value="2018"
                                                    {{ old('2018') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->tahun_lulus == '2018' ? 'selected' : '') : '') }}>
                                                    2018</option>
                                                <option value="2019"
                                                    {{ old('2019') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->tahun_lulus == '2019' ? 'selected' : '') : '') }}>
                                                    2019</option>
                                                <option value="2020"
                                                    {{ old('2020') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->tahun_lulus == '2020' ? 'selected' : '') : '') }}>
                                                    2020</option>
                                                <option value="2021"
                                                    {{ old('2021') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->tahun_lulus == '2021' ? 'selected' : '') : '') }}>
                                                    2021</option>
                                                <option value="2022"
                                                    {{ old('2022') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->tahun_lulus == '2022' ? 'selected' : '') : '') }}>
                                                    2022</option>
                                                <option value="2023"
                                                    {{ old('2023') ?? (Auth::user()->Alumni != null ? (Auth::user()->Alumni->tahun_lulus == '2023' ? 'selected' : '') : '') }}>
                                                    2023</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        @endif

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

    </div>

@endsection

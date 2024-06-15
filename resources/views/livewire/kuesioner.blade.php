<div>

    <form action="{{ route('tracer-study.kuesioner-form') }}" method="POST">
        @csrf

        @if ($currentStep == 1)
            {{-- STEP 1 --}}
            <div class="step-one">
                <div class="card">
                    <div class="card-header bg-secondary text-white">STEP 1/4 - Data Alumni</div>
                    <div class="card-body">
                        <p>*) Jika ada salah penginputan silahkan mengganti data terlebih dahulu pada halaman profil</p>
                        {{-- Nama Alumni --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input disabled type="text" value="{{ old('name', Auth::user()->name) }}"
                                        class="form-control" placeholder="Enter first name" required name="name">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- NIM Alumni --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">NIM Alumni</label>
                                    <input disabled type="text" value="{{ old('username', Auth::user()->username) }}"
                                        class="form-control" placeholder="NIM Alumni" required name="username">
                                    <span class="text-danger">
                                        @error('username')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Email Alumni --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Email Alumni</label>
                                    <input disabled type="text" value="{{ old('email', Auth::user()->email) }}"
                                        class="form-control" placeholder="Email Alumni" required name="email">
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Nomor Telpon Alumni --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nomor Telpon Alumni</label>
                                    <input disabled type="text"
                                        value="{{ old('phone', Auth::user()->phone_number) }}" class="form-control"
                                        placeholder="Nomor Telpon Alumni" required name="phone">
                                    <span class="text-danger">
                                        @error('phone')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Jenis Kelamin + Agama --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <input disabled type="text"
                                        value="{{ old('jenis_kelamin', Auth::user()->Alumni->jenis_kelamin) }}"
                                        class="form-control" placeholder="Jenis Kelamin" required name="jenis_kelamin">
                                    <span class="text-danger">
                                        @error('jenis_kelamin')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Agama</label>
                                    <input disabled type="text"
                                        value="{{ old('agama', Auth::user()->Alumni->agama) }}" class="form-control"
                                        placeholder="Agama" required name="agama">
                                    <span class="text-danger">
                                        @error('agama')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Angkatan + Lulusan --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Angkatan</label>
                                    <input disabled type="text"
                                        value="{{ old('tahun_masuk', Auth::user()->Alumni->tahun_masuk) }}"
                                        class="form-control" placeholder="Angkatan" required name="tahun_masuk">
                                    <span class="text-danger">
                                        @error('tahun_masuk')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Lulusan</label>
                                    <input disabled type="text"
                                        value="{{ old('tahun_lulus', Auth::user()->Alumni->tahun_lulus) }}"
                                        class="form-control" placeholder="Lulusan" required name="tahun_lulus">
                                    <span class="text-danger">
                                        @error('tahun_lulus')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Prodi + Jenjang --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Program Studi</label>
                                    <input disabled type="text"
                                        value="{{ old('prodi', Auth::user()->Alumni->prodi) }}" class="form-control"
                                        placeholder="Program Studi" required name="prodi">
                                    <span class="text-danger">
                                        @error('prodi')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jenjang</label>
                                    <input disabled type="text"
                                        value="{{ old('jenjang', Auth::user()->Alumni->jenjang) }}"
                                        class="form-control" placeholder="Jenjang" required name="jenjang">
                                    <span class="text-danger">
                                        @error('jenjang')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($currentStep == 2)
            {{-- STEP 2 --}}
            <div class="step-two">
                <div class="card">
                    <div class="card-header bg-secondary text-white">STEP 2/4 - Form Tracer Study</div>
                    <div class="card-body">
                        <table class='table table-striped table-responsive'>
                            <tr>
                                <td colspan='4'><b>Tracer Study</td>
                            </tr>
                            <tr id='p_alumni_status'>
                                <td valign='top'>Jelaskan status Anda saat ini?</td>
                                <td valign='top' style='width:5px;'>:</td>
                                <td>
                                    <input type='radio' required name='p_alumni_status' value='1'>
                                    [1] Bekerja (fulltime / part time) <span class='hl'>(f8)</span> <br />
                                    <input type='radio' required name='p_alumni_status' value='2'>
                                    [3] Wiraswasta <br />
                                    <input type='radio' required name='p_alumni_status' value='3'>
                                    [4]
                                    Melanjutkan Pendidikan <br />
                                    <input type='radio' required name='p_alumni_status' value='4'> [5]
                                    Tidak Kerja tetapi sedang mencari kerja <br />
                                    <input type='radio' required name='p_alumni_status' value='5'> [2] Belum
                                    memungkinkan bekerja
                                    (Menikah/wajib
                                    militer/mengurus keluarga) <br />
                                </td>
                            </tr>
                            <tr id='p_job_position' class='tr-quis2'>
                                <td valign='top'>Apa posisi/jabatan Anda saat ini?</td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='radio' required name='p_job_position' class='inp-f5c'
                                        value='1'>
                                    Founder <span class='hl'>(f5c)</span><br />
                                    <input type='radio' required name='p_job_position' class='inp-f5c'
                                        value='2'>
                                    Co-Founder
                                    <br />
                                    <input type='radio' required name='p_job_position' class='inp-f5c'
                                        value='3'>
                                    Staff
                                    <br />
                                    <input type='radio' required name='p_job_position' class='inp-f5c'
                                        value='4'>
                                    Freelance/Kerja Lepas <br />
                                    <input type='radio' required name='p_job_position' class='inp-f5c'
                                        value='5'>
                                    Belum Bekerja
                                </td>
                            </tr>
                            <tr id='p_job_before_status' class='tr-quis'>
                                <td valign='top'>Apakah Anda telah mendapatkan pekerjaan/berwiraswasta &lt;=
                                    6 bulan sebelum lulus?</td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='radio' required name='p_job_before_status' class='inp-f504'
                                        value='1'>
                                    Ya <span class='hl'>(f5-04)</span><br />
                                    <input type='radio' required name='p_job_before_status' class='inp-f504'
                                        value='0'>
                                    Tidak <br />
                                </td>
                            </tr>
                            <tr id='p_job_acquired_time' class='tr-quis'>
                                <td valign='top'>Berapa bulan waktu yang Anda butuhkan untuk mendapatkan
                                    pekerjaan pertama/berwiraswasta ?<br /> * Contoh pengisian : 6 (isikan 0
                                    jika bekerja sebelum lulus)</td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='number' required name='p_job_acquired_time' class='inp-f506'
                                        size='5' maxlength='2' value=''
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    Bulan &nbsp;&nbsp;<span class='hl'>(f5-06)</span>
                                </td>
                            </tr>
                            <tr id='p_company' class='tr-quis'>
                                <td valign='top'>Apa nama perusahaan/kantor tempat Anda
                                    bekerja/berwiraswasta saat ini?
                                </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='text' required name='p_company' class='inp-f5b' size='30'
                                        maxlength='255'><span class='hl'>(f5b)</span>
                                </td>
                            </tr>
                            <tr id='p_salary' class='tr-quis'>
                                <td valign='top'>Berapa rata-rata pendapatan Anda per bulan? (Take Home Pay)
                                    <br />* Contoh pengisian : 10000000 (tanpa titik)
                                </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='number' required name='p_salary' class='inp-f505' size='30'
                                        maxlength='12'
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"><span
                                        class='hl'>(f505)</span>
                                </td>
                            </tr>
                            <tr id='p_company_location' class='tr-quis'>
                                <td valign='top'>Dimanakah lokasi tempat Anda bekerja/berwiraswasta?<br />
                                </td>
                                <td valign='top'>:</td>
                                <td>
                                    <table class='table table-responsive'>
                                        <tr>
                                            <td>Provinsi</td>
                                            <td> &nbsp;
                                                <select id='p_company_province' required name='p_company_province'
                                                    class='inp-f5a' style="width:200px"
                                                    wire:change='get_regencies($event.target.value)'>
                                                    <option value='' hidden>-- Pilih Provinsi --</option>
                                                    @foreach ($provinces as $province)
                                                        <option value='{{ $province->id }}'>{{ $province->name }}
                                                        </option>
                                                    @endforeach
                                                </select><span class='hl'>(f5a1)</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kabupaten</td>
                                            <td> &nbsp;
                                                <select id='p_company_regency' required name='p_company_regency'
                                                    class='inp-f5a'>
                                                    <option value='' hidden>-- Pilih Kabupaten/Kota
                                                        --</option>
                                                    @foreach ($regencies as $regency)
                                                        <option value='{{ $regency->id }}'>{{ $regency->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <select id='inp-f5a2tmp' style='display:none'>
                                                </select><span class='hl'>(f5a2)</span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr id='p_company_type' class='tr-quis'>
                                <td valign='top'>Apa jenis perusahaan/instansi/institusi tempat anda bekerja
                                    sekarang? <br />* Jika bekerja di luar negeri maka pilih Lainnya dan
                                    tuliskan nama perusahaan dan negaranya, contoh SM Entertainment, Korea
                                    Selatan
                                </td>
                                <td valign='top'>:</td>
                                <td>
                                    <table class='table table-striped table-responsive'>
                                        <tr>
                                            <td>
                                                <input type='radio' required name='p_company_type' class='inp-f11'
                                                    value='Instansi Pemerintah'>
                                                Instansi
                                                Pemerintah <br />
                                                <input type='radio' required name='p_company_type' class='inp-f11'
                                                    value='BUMN/BUMD'>
                                                BUMN/BUMD<br />
                                                <input type='radio' required name='p_company_type' class='inp-f11'
                                                    value='Institusi/Organisasi Multilateral'>
                                                Institusi/Organisasi Multilateral<br />
                                                <input type='radio' required name='p_company_type' class='inp-f11'
                                                    value='Organisasi non-profit/Lembaga Swadaya Masyarakat'>
                                                Organisasi non-profit/Lembaga Swadaya Masyarakat<br />
                                                <input type='radio' required name='p_company_type' class='inp-f11'
                                                    value='Perusahaan swasta'>
                                                Perusahaan swasta<br />
                                                <input type='radio' required name='p_company_type' class='inp-f11'
                                                    value='Wiraswasta/perusahaan sendiri'>
                                                Wiraswasta/perusahaan sendiri<br />
                                                <input type='radio' required name='p_company_type' class='inp-f11'
                                                    value='5' id='inp-f11-lainnya'> [5] Lainnya, tuliskan:
                                            </td>
                                            <td><span class='hl'>(f11-01)</span></td>
                                        </tr>
                                        <tr>
                                            <td><input type='text' name='p_company_type_other' value=''
                                                    size='50' maxlength='150' id='inp-f1102'></td>
                                            <td><span class='hl'>(f11-02)</span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr id='p_company_level' class='tr-quis'>
                                <td valign='top'>Apa tingkat tempat kerja Anda?
                                </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='radio' required name='p_company_level' class='inp-f5d'
                                        value='Lokal/wilayah/wiraswasta tidak berbadan hukum'>
                                    Lokal/wilayah/wiraswasta tidak berbadan hukum <span
                                        class='hl'>(f5d)</span><br />
                                    <input type='radio' required name='p_company_level' class='inp-f5d'
                                        value='Nasional/wiraswasta berbadan hukum'>
                                    Nasional/wiraswasta
                                    berbadan hukum<br />
                                    <input type='radio' required name='p_company_level' class='inp-f5d'
                                        value='Multinasional/internasional'>
                                    Multinasional/internasional
                                    <br />
                                </td>
                            </tr>
                            <tr id='p_location' class='tr-quis4'>
                                <td valign='top'>Dimanakah lokasi Anda melanjutkan studi?
                                </td>
                                <td valign='top'>:</td>
                                <td>
                                    <table class='table table-striped table-responsive'>
                                        <tr>
                                            <td>
                                                <input type='radio' required name='p_location' class='inp-f19'
                                                    value='Dalam Negeri'> Dalam
                                                Negeri <br />
                                                <input type='radio' required name='p_location' class='inp-f19'
                                                    value='Luar Negeri'> Luar
                                                Negeri, tuliskan:<br />
                                            </td>
                                            <td><span class='hl'>(f19a)</span></td>
                                        </tr>
                                        <tr>
                                            <td><input type='text' name='p_location_remark' value=''
                                                    size='50' maxlength='50'>
                                            </td>
                                            <td><span class='hl'>(f19b)</span></td>
                                    </table>
                                </td>
                            </tr>
                            <tr id='p_payment_type' class='tr-quis4'>
                                <td valign='top'>Darimanakah sumber biaya studi lanjut Anda?
                                </td>
                                <td valign='top'>:</td>
                                <td>
                                    <table class='table table-striped table-responsive'>
                                        <tr>
                                            <td>
                                                <input type='radio' required name='p_payment_type' class='inp-f18'
                                                    value='Biaya Sendiri'>
                                                Biaya
                                                Sendiri <br />
                                                <input type='radio' required name='p_payment_type' class='inp-f18'
                                                    value='Beasiswa'>
                                                Beasiswa,
                                                tuliskan:<br />
                                            </td>
                                            <td><span class='hl'>(f18a)</span></td>
                                        </tr>
                                        <tr>
                                            <td><input type='text' name='p_payment_type_remark' value=''
                                                    size='50' maxlength='150' /></td>
                                            <td><span class='hl'>(fub304)</span></td>
                                    </table>
                                </td>
                            </tr>
                            <tr id='p_start_date' class='tr-quis4'>
                                <td valign='top'>Kapankah Anda memulai studi lanjut?
                                </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='date' required name='p_start_date'
                                        class='date-picker inp-f18e' /><span class='hl'>(f18d)</span>
                                </td>
                            </tr>
                            <tr id='p_university_name' class='tr-quis4'>
                                <td valign='top'>Apa nama Perguruan Tinggi tempat Anda melanjutkan studi?
                                    <br />* Contoh pengisian : Politeknik Negeri Jakarta
                                </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='text' required name='p_university_name' class='inp-f18c'
                                        value='' maxlength='150' /><span class='hl'>(f18b)</span>
                                </td>
                            </tr>
                            <tr id='p_major' class='tr-quis4'>
                                <td valign='top'>Apa nama program studi yang Anda ambil dalam melanjutkan
                                    studi? <br /> * Contoh pengisian : Magister Teknik Mesin
                                </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='text' required name='p_major' class='inp-f18d' value=''
                                        maxlength='150' /><span class='hl'>(f18c)</span>
                                </td>
                            </tr>
                            <tr id='p_reasons' class='tr-quis4'>
                                <td valign='top'>Apa alasan Anda melanjutkan studi? <span
                                        class='hl'>(fub305)</span>
                                </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='radio' required name='p_reasons' class='inp-f18f'
                                        value='Tuntutan profesi'>
                                    Tuntutan profesi <br />
                                    <input type='radio' required name='p_reasons' class='inp-f18f'
                                        value='Kesempatan beasiswa'> Kesempatan
                                    beasiswa <br />
                                    <input type='radio' required name='p_reasons' class='inp-f18f'
                                        value='Prestise'>
                                    Prestise <br />
                                    <input type='radio' required name='p_reasons' class='inp-f18f'
                                        value='Belum ada keinginan untuk bekerja'>
                                    Belum ada keinginan untuk
                                    bekerja <br />
                                </td>
                            </tr>
                            <tr id='p_university_payment_source' class='tr-quis'>
                                <td valign='top'>Sebutkan sumberdana dalam pembiayaan kuliah?</td>
                                <td valign='top'>:</td>
                                <td>
                                    <table class='table table-striped table-responsive'>
                                        <tr>
                                            <td>
                                                <input type='radio' required name='p_university_payment_source'
                                                    class='inp-f12' value='Biaya Sendiri / Keluarga'>
                                                [1] Biaya Sendiri / Keluarga<br />
                                                <input type='radio' required name='p_university_payment_source'
                                                    class='inp-f12'
                                                    value='Beasiswa ADik (Afirmasi Pendidikan Tinggi)'>
                                                [2] Beasiswa ADik (Afirmasi Pendidikan Tinggi)<br />
                                                <input type='radio' required name='p_university_payment_source'
                                                    class='inp-f12'
                                                    value='Beasiswa KIP-K (Kartu Indonesia Pintar Kuliah)/Bidikmisi'>
                                                [3] Beasiswa KIP-K (Kartu Indonesia Pintar
                                                Kuliah)/Bidikmisi<br />
                                                <input type='radio' required name='p_university_payment_source'
                                                    class='inp-f12'
                                                    value='Beasiswa PPA (Peningkatan Prestasi Akademik)'>
                                                [4] Beasiswa PPA (Peningkatan Prestasi Akademik)<br />
                                                <input type='radio' required name='p_university_payment_source'
                                                    class='inp-f12' value='Beasiswa AFIRMASI'>
                                                [5] Beasiswa AFIRMASI<br />
                                                <input type='radio' required name='p_university_payment_source'
                                                    class='inp-f12' value='Beasiswa Perusahaan/Swasta'>
                                                [6] Beasiswa Perusahaan/Swasta<br />
                                                <input type='radio' required name='p_university_payment_source'
                                                    class='inp-f12' value='7' id='inp-f1201-lainnya'> [7]
                                                Lainnya, tuliskan:
                                            </td>
                                            <td><span class='hl'>(f12-01)</span></td>
                                        </tr>
                                        <tr>
                                            <td><input type='text' name='p_university_payment_source'
                                                    value='' size='50' maxlength='150' id='inp-f1202'>
                                            </td>
                                            <td><span class='hl'>(f12-02)</span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr id='p_university_company_relation' class='tr-quis'>

                                <td valign='top'>Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?
                                    <br /> *
                                    Jika belum/tidak bekerja, isi Tidak Sama Sekali
                                </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='radio' required name='p_university_company_relation'
                                        class='inp-f14' value='1'> [1]
                                    Sangat
                                    Erat <span class='hl'>(f14)</span><br />
                                    <input type='radio' required name='p_university_company_relation'
                                        class='inp-f14' value='2'> [2]
                                    Erat<br />
                                    <input type='radio' required name='p_university_company_relation'
                                        class='inp-f14' value='3'> [3]
                                    Cukup
                                    Erat<br />
                                    <input type='radio' required name='p_university_company_relation'
                                        class='inp-f14' value='4'> [4]
                                    Kurang
                                    Erat<br />
                                    <input type='radio' required name='p_university_company_relation'
                                        class='inp-f14' value='5'> [5]
                                    Tidak
                                    Sama Sekali <br />
                                </td>
                            </tr>
                            <tr id='p_university_company_level' class='tr-quis'>
                                <td valign='top'>
                                    Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?
                                </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='radio' required name='p_university_company_level' class='inp-f15'
                                        value='1'> [1]
                                    Setingkat Lebih Tinggi
                                    <span class='hl'>(f15)</span><br />
                                    <input type='radio' required name='p_university_company_level' class='inp-f15'
                                        value='2'> [2]
                                    Tingkat
                                    yang Sama<br />
                                    <input type='radio' required name='p_university_company_level' class='inp-f15'
                                        value='3'> [3]
                                    Setingkat Lebih
                                    Rendah<br />
                                    <input type='radio' required name='p_university_company_level' class='inp-f15'
                                        value='4'> [4]
                                    Tidak
                                    Perlu Pendidikan
                                    Tinggi<br />
                                </td>
                            </tr>
                            <tr id='p_competency' class='tr-quis'>
                                <td valign='top'>
                                    (A)Pada saat lulus, pada tingkat mana kompetensi di bawah ini yang Anda kuasai?
                                    <br />
                                    (B) Pada saat ini, pada tingkat mana kompetensi di bawah ini diperlukan dalam
                                    pekerjaan?
                                    <span class='hl'>(f7)</span>
                                </td>
                                <td valign='top'>:</td>
                                <td>
                                    <table class='table table-striped table-responsive'>
                                        <tr>

                                            <th colspan='5' style='text-align:center;'>A</th>
                                            <th rowspan='3' style='text-align:center; vertical-align:middle '>
                                                Kompetensi&nbsp; </th>
                                            <th colspan='5' style='text-align:center;'>B</th>
                                        </tr>
                                        <tr>
                                            <th>Sangat Rendah</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>Sangat Tinggi</th>
                                            <th>Sangat Rendah</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>Sangat Tinggi</th>
                                        <tr>
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <th>5</th>
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <th>5</th>
                                        </tr>
                                        <tr>
                                            <td><input type='radio' required name='p_ethics_graduation'
                                                    class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' required name='p_ethics_graduation'
                                                    class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' required name='p_ethics_graduation'
                                                    class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' required name='p_ethics_graduation'
                                                    class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' required name='p_ethics_graduation'
                                                    class='inp-f17' value='5'>
                                            </td>
                                            <td>Etika <span class='hl'>f17-01a f17-01b</span></td>
                                            <td><input type='radio' required name='p_ethics_work' class='inp-f17'
                                                    value='1'>
                                            </td>
                                            <td><input type='radio' required name='p_ethics_work' class='inp-f17'
                                                    value='2'>
                                            </td>
                                            <td><input type='radio' required name='p_ethics_work' class='inp-f17'
                                                    value='3'>
                                            </td>
                                            <td><input type='radio' required name='p_ethics_work' class='inp-f17'
                                                    value='4'>
                                            </td>
                                            <td><input type='radio' required name='p_ethics_work' class='inp-f17'
                                                    value='5'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type='radio' required name='p_expertise_graduation'
                                                    class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' required name='p_expertise_graduation'
                                                    class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' required name='p_expertise_graduation'
                                                    class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' required name='p_expertise_graduation'
                                                    class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' required name='p_expertise_graduation'
                                                    class='inp-f17' value='5'>
                                            </td>
                                            <td>Keahlian berdasarkan bidang ilmu <span class='hl'>f17-02a
                                                    f17-02b</span>
                                            </td>
                                            <td><input type='radio' required name='p_expertise_work'
                                                    class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' required name='p_expertise_work'
                                                    class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' required name='p_expertise_work'
                                                    class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' required name='p_expertise_work'
                                                    class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' required name='p_expertise_work'
                                                    class='inp-f17' value='5'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type='radio' required name='p_english_graduation'
                                                    class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' required name='p_english_graduation'
                                                    class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' required name='p_english_graduation'
                                                    class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' required name='p_english_graduation'
                                                    class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' required name='p_english_graduation'
                                                    class='inp-f17' value='5'>
                                            </td>
                                            <td>Bahasa Inggris <span class='hl'>f17-03a f17-03b</span></td>
                                            <td><input type='radio' required name='p_english_work' class='inp-f17'
                                                    value='1'>
                                            </td>
                                            <td><input type='radio' required name='p_english_work' class='inp-f17'
                                                    value='2'>
                                            </td>
                                            <td><input type='radio' required name='p_english_work' class='inp-f17'
                                                    value='3'>
                                            </td>
                                            <td><input type='radio' required name='p_english_work' class='inp-f17'
                                                    value='4'>
                                            </td>
                                            <td><input type='radio' required name='p_english_work' class='inp-f17'
                                                    value='5'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type='radio' required name='p_tech_graduation'
                                                    class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' required name='p_tech_graduation'
                                                    class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' required name='p_tech_graduation'
                                                    class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' required name='p_tech_graduation'
                                                    class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' required name='p_tech_graduation'
                                                    class='inp-f17' value='5'>
                                            </td>
                                            <td>Penggunaan Teknologi Informasi <span class='hl'>f17-04a
                                                    f17-04b</span></td>
                                            <td><input type='radio' required name='p_tech_work' class='inp-f17'
                                                    value='1'>
                                            </td>
                                            <td><input type='radio' required name='p_tech_work' class='inp-f17'
                                                    value='2'>
                                            </td>
                                            <td><input type='radio' required name='p_tech_work' class='inp-f17'
                                                    value='3'>
                                            </td>
                                            <td><input type='radio' required name='p_tech_work' class='inp-f17'
                                                    value='4'>
                                            </td>
                                            <td><input type='radio' required name='p_tech_work' class='inp-f17'
                                                    value='5'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type='radio' required name='p_communication_graduation'
                                                    class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' required name='p_communication_graduation'
                                                    class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' required name='p_communication_graduation'
                                                    class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' required name='p_communication_graduation'
                                                    class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' required name='p_communication_graduation'
                                                    class='inp-f17' value='5'>
                                            </td>
                                            <td>Komunikasi <span class='hl'>f17-05a f17-05b</span></td>
                                            <td><input type='radio' required name='p_communication_work'
                                                    class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' required name='p_communication_work'
                                                    class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' required name='p_communication_work'
                                                    class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' required name='p_communication_work'
                                                    class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' required name='p_communication_work'
                                                    class='inp-f17' value='5'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type='radio' required name='p_teamwork_graduation'
                                                    class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' required name='p_teamwork_graduation'
                                                    class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' required name='p_teamwork_graduation'
                                                    class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' required name='p_teamwork_graduation'
                                                    class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' required name='p_teamwork_graduation'
                                                    class='inp-f17' value='5'>
                                            </td>
                                            <td>Kerja sama tim <span class='hl'>f17-06a f17-06b</span></td>
                                            <td><input type='radio' required name='p_teamwork_work' class='inp-f17'
                                                    value='1'>
                                            </td>
                                            <td><input type='radio' required name='p_teamwork_work' class='inp-f17'
                                                    value='2'>
                                            </td>
                                            <td><input type='radio' required name='p_teamwork_work' class='inp-f17'
                                                    value='3'>
                                            </td>
                                            <td><input type='radio' required name='p_teamwork_work' class='inp-f17'
                                                    value='4'>
                                            </td>
                                            <td><input type='radio' required name='p_teamwork_work' class='inp-f17'
                                                    value='5'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type='radio' required name='p_development_graduation'
                                                    class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' required name='p_development_graduation'
                                                    class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' required name='p_development_graduation'
                                                    class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' required name='p_development_graduation'
                                                    class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' required name='p_development_graduation'
                                                    class='inp-f17' value='5'>
                                            </td>
                                            <td>Pengembangan diri <span class='hl'>f17-07a f17-07b</span></td>
                                            <td><input type='radio' required name='p_development_work'
                                                    class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' required name='p_development_work'
                                                    class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' required name='p_development_work'
                                                    class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' required name='p_development_work'
                                                    class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' required name='p_development_work'
                                                    class='inp-f17' value='5'>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr id='p_methods' class='tr-quis'>
                                <td valign='top'>Menurut Anda seberapa besar penekanan pada metode pembelajaran di
                                    bawah ini
                                    ketika dilaksanakan di program studi Anda di PNJ?</td>
                                <td valign='top'>:</td>
                                <td>
                                    <table class='table table-striped table-responsive'>
                                        <tr>
                                            <td>Perkuliahan</td>
                                            <td> :</td>
                                            <td>
                                                <input type='radio' required name='p_lecture_method' class='inp-f2'
                                                    value='1'> Sangat
                                                Besar <span class='hl'>(f201)</span> <br />
                                                <input type='radio' required name='p_lecture_method' class='inp-f2'
                                                    value='2'>
                                                Besar <br />
                                                <input type='radio' required name='p_lecture_method' class='inp-f2'
                                                    value='3'> Cukup
                                                Besar <br />
                                                <input type='radio' required name='p_lecture_method' class='inp-f2'
                                                    value='4'>
                                                Kurang <br />
                                                <input type='radio' required name='p_lecture_method' class='inp-f2'
                                                    value='5'>
                                                Tidak Sama Sekali <br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Demonstrasi</td>
                                            <td> :</td>
                                            <td>
                                                <input type='radio' required name='p_demo_method' class='inp-f2'
                                                    value='1'> Sangat
                                                Besar <span class='hl'>(f202)</span> <br />
                                                <input type='radio' required name='p_demo_method' class='inp-f2'
                                                    value='2'>
                                                Besar <br />
                                                <input type='radio' required name='p_demo_method' class='inp-f2'
                                                    value='3'> Cukup
                                                Besar <br />
                                                <input type='radio' required name='p_demo_method' class='inp-f2'
                                                    value='4'>
                                                Kurang <br />
                                                <input type='radio' required name='p_demo_method' class='inp-f2'
                                                    value='5'>
                                                Tidak Sama Sekali <br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Partisipasi dalam proyek riset</td>
                                            <td> :</td>
                                            <td>
                                                <input type='radio' required name='p_project_method' class='inp-f2'
                                                    value='1'> Sangat
                                                Besar <span class='hl'>(f203)</span> <br />
                                                <input type='radio' required name='p_project_method' class='inp-f2'
                                                    value='2'>
                                                Besar <br />
                                                <input type='radio' required name='p_project_method' class='inp-f2'
                                                    value='3'> Cukup
                                                Besar <br />
                                                <input type='radio' required name='p_project_method' class='inp-f2'
                                                    value='4'>
                                                Kurang <br />
                                                <input type='radio' required name='p_project_method' class='inp-f2'
                                                    value='5'>
                                                Tidak Sama Sekali <br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Magang</td>
                                            <td> :</td>
                                            <td>
                                                <input type='radio' required name='p_internship_method'
                                                    class='inp-f2' value='1'>
                                                Sangat
                                                Besar <span class='hl'>(f204)</span> <br />
                                                <input type='radio' required name='p_internship_method'
                                                    class='inp-f2' value='2'>
                                                Besar <br />
                                                <input type='radio' required name='p_internship_method'
                                                    class='inp-f2' value='3'>
                                                Cukup
                                                Besar <br />
                                                <input type='radio' required name='p_internship_method'
                                                    class='inp-f2' value='4'>
                                                Kurang <br />
                                                <input type='radio' required name='p_internship_method'
                                                    class='inp-f2' value='5'>
                                                Tidak Sama Sekali <br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Praktikum</td>
                                            <td> :</td>
                                            <td>
                                                <input type='radio' required name='p_practical_method'
                                                    class='inp-f2' value='1'>
                                                Sangat
                                                Besar <span class='hl'>(f205)</span> <br />
                                                <input type='radio' required name='p_practical_method'
                                                    class='inp-f2' value='2'>
                                                Besar <br />
                                                <input type='radio' required name='p_practical_method'
                                                    class='inp-f2' value='3'> Cukup
                                                Besar <br />
                                                <input type='radio' required name='p_practical_method'
                                                    class='inp-f2' value='4'>
                                                Kurang <br />
                                                <input type='radio' required name='p_practical_method'
                                                    class='inp-f2' value='5'>
                                                Tidak Sama Sekali <br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kerja lapangan</td>
                                            <td> :</td>
                                            <td>
                                                <input type='radio' required name='p_field_method' class='inp-f2'
                                                    value='1'> Sangat
                                                Besar <span class='hl'>(f206)</span> <br />
                                                <input type='radio' required name='p_field_method' class='inp-f2'
                                                    value='2'>
                                                Besar <br />
                                                <input type='radio' required name='p_field_method' class='inp-f2'
                                                    value='3'> Cukup
                                                Besar <br />
                                                <input type='radio' required name='p_field_method' class='inp-f2'
                                                    value='4'>
                                                Kurang <br />
                                                <input type='radio' required name='p_field_method' class='inp-f2'
                                                    value='5'>
                                                Tidak Sama Sekali <br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Diskusi</td>
                                            <td> :</td>
                                            <td>
                                                <input type='radio' required name='p_discussion_method'
                                                    class='inp-f2' value='1'>
                                                Sangat
                                                Besar <span class='hl'>(f207)</span> <br />
                                                <input type='radio' required name='p_discussion_method'
                                                    class='inp-f2' value='2'>
                                                Besar <br />
                                                <input type='radio' required name='p_discussion_method'
                                                    class='inp-f2' value='3'>
                                                Cukup
                                                Besar <br />
                                                <input type='radio' required name='p_discussion_method'
                                                    class='inp-f2' value='4'>
                                                Kurang <br />
                                                <input type='radio' required name='p_discussion_method'
                                                    class='inp-f2' value='5'>
                                                Tidak Sama Sekali <br />
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr id='p_job_hunt' class='tr-quis'>
                                <td valign='top'>Kapankah Anda mulai mencari pekerjaan?<br />
                                    *Mohon pekerjaan sambilan tidak dimasukkan<br /> * Contoh pengisian : 6</td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='radio' required name='p_job_hunt_type' class='inp-f3'
                                        value='Sebelum Lulus'>
                                    Kira-kira <input name='p_job_hunt_month[0]' type='number' value=''
                                        maxlength='2'
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                                    bulan sebelum lulus <span class='hl'>(f302)</span><br />
                                    <input type='radio' required name='p_job_hunt_type' class='inp-f3'
                                        value='Setelah Lulus'>
                                    Kira-kira <input name='p_job_hunt_month[1]' type='number' value=''
                                        maxlength='2'
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                                    setelah lulus <span class='hl'>(f303)</span><br />
                                    <input type='radio' required name='p_job_hunt_type' class='inp-f3'
                                        value='Saya tidak mencari kerja'>Saya
                                    tidak mencari kerja <span class='hl'>(f301)</span><br />
                                </td>
                            </tr>
                            <tr id='p_job_hunt_method' class='tr-quis'>
                                <td valign='top'>Bagaimanakah Anda mencari pekerjaan tersebut?<br />
                                    Jawaban bisa lebih dari satu </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='checkbox' name='p_job_hunt_method[0]' class='inp-f4'
                                        value='Melalui iklan di koran/majalah, brosur'> Melalui iklan di koran/majalah,
                                    brosur <span class='hl'>(f401)</span><br />
                                    <input type='checkbox' name='p_job_hunt_method[1]' class='inp-f4'
                                        value='Melamar ke perusahaan tanpa mengatuhi lowongan yang ada'> Melamar ke
                                    perusahaan tanpa mengatuhi lowongan yang ada <span
                                        class='hl'>(f402)</span><br />
                                    <input type='checkbox' name='p_job_hunt_method[2]' class='inp-f4'
                                        value='Pergi ke bursa/pameran kerja'>
                                    Pergi ke bursa/pameran kerja <span class='hl'>(f403)</span><br />
                                    <input type='checkbox' name='p_job_hunt_method[3]' class='inp-f4'
                                        value='Mencari lewat internet/iklan online/milis'> Mencari lewat internet/iklan
                                    online/milis <span class='hl'>(f404)</span><br />
                                    <input type='checkbox' name='p_job_hunt_method[4]' class='inp-f4'
                                        value='Dihubungi oleh perusahaan'>
                                    Dihubungi oleh perusahaan <span class='hl'>(f405)</span><br />
                                    <input type='checkbox' name='p_job_hunt_method[5]' class='inp-f4'
                                        value='Menghubungi Kemenakertrans'>
                                    Menghubungi Kemenakertrans <span class='hl'>(f406)</span><br />
                                    <input type='checkbox' name='p_job_hunt_method[6]' class='inp-f4'
                                        value='Menghubungi agen tenaga kerja komersial/swasta'> Menghubungi agen tenaga
                                    kerja komersial/swasta <span class='hl'>(f407)</span><br />
                                    <input type='checkbox' name='p_job_hunt_method[7]' class='inp-f4'
                                        value='Memperoleh informasi dari pusat pengembangan karir fakultas/universitas'>
                                    Memperoleh informasi dari pusat pengembangan karir fakultas/universitas <span
                                        class='hl'>(f408)</span><br />
                                    <input type='checkbox' name='p_job_hunt_method[8]' class='inp-f4'
                                        value='Menghubungi kantor kemahasiswaan/hubungan alumni'> Menghubungi kantor
                                    kemahasiswaan/hubungan alumni <span class='hl'>(f409)</span><br />
                                    <input type='checkbox' name='p_job_hunt_method[9]' class='inp-f4'
                                        value='Membangun jejaring (network) sejak masih kuliah'> Membangun jejaring
                                    (network) sejak masih kuliah <span class='hl'>(f410)</span><br />
                                    <input type='checkbox' name='p_job_hunt_method[10]' class='inp-f4'
                                        value='Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll)'>
                                    Melalui
                                    relasi (misalnya dosen, orang tua, saudara, teman, dll) <span
                                        class='hl'>(f411)</span><br />
                                    <input type='checkbox' name='p_job_hunt_method[11]' class='inp-f4'
                                        value='Membangun bisnis sendiri'>
                                    Membangun bisnis sendiri <span class='hl'>(f412)</span><br />
                                    <input type='checkbox' name='p_job_hunt_method[12]' class='inp-f4'
                                        value='Melalui penempatan kerja atau magang'> Melalui penempatan kerja atau
                                    magang
                                    <span class='hl'>(f413)</span><br />
                                    <input type='checkbox' name='p_job_hunt_method[13]' class='inp-f4'
                                        value='Bekerja di tempat yang sama dengan tempat kerja semasa kuliah'> Bekerja
                                    di
                                    tempat yang sama dengan tempat kerja semasa kuliah <span
                                        class='hl'>(f414)</span><br />
                                    <input type='checkbox' id='inp-f415a' name='p_job_hunt_method[14]'
                                        class='inp-f4' value='Lainnya'>Lainnya:
                                    <input type='text' id='inp-f415b' name='p_job_hunt_method_other'
                                        maxlength='150'> <span class='hl'>(f415a -
                                        f415b)</span><br />
                                </td>
                            </tr>
                            <tr id='p_applied_company' class='tr-quis'>
                                <td valign='top'>Berapa perusahaan/instansi/institusi yang sudah Anda lamar (lewat
                                    surat
                                    atau email) sebelum Anda memperoleh pekerjaan? <br /> * Contoh pengisian : 10</td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='number' required name='p_applied_company' class='inp-f6'
                                        size='5' value='' maxlength='3'
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    perusahaan/instansi/institusi
                                </td>
                            </tr>
                            <tr id='p_applied_company_responded' class='tr-quis'>
                                <td valign='top'>Berapa banyak perusahaan/instansi/institusi yang merespon lamaran
                                    Anda?<br />* Contoh pengisian : 7 </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='number' required name='p_applied_company_responded'
                                        class='inp-f7' size='5' value='' maxlength='3'
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    perusahaan/instansi/institusi
                                </td>
                            </tr>
                            <tr id='p_applied_company_interview' class='tr-quis'>
                                <td valign='top'>Berapa banyak perusahaan/instansi/institusi yang mengundang Anda
                                    untuk
                                    wawancara?<br /> Contoh pengisian : 3 </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='number' required name='p_applied_company_interview'
                                        class='inp-f7a' size='5' value='' maxlength='3'
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    perusahaan/instansi/institusi
                                </td>
                            </tr>
                            <tr id='p_job_hunting_status' class='tr-quis'>
                                <td valign='top'>Apakah Anda aktif mencari pekerjaan dalam 4 minggu terakhir? </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='radio' required name='p_job_hunting_status' class='inp-f10'
                                        value='Tidak'> Tidak
                                    <span class='hl'>(f10-01)</span><br />
                                    <input type='radio' required name='p_job_hunting_status' class='inp-f10'
                                        value='Tidak, tapi saya sedang menunggu hasil lamaran kerja'> Tidak, tapi saya
                                    sedang menunggu hasil lamaran kerja <span class='hl'>(f10-01)</span><br />
                                    <input type='radio' required name='p_job_hunting_status' class='inp-f10'
                                        value='Ya, saya akan mulai bekerja dalam 2 minggu ke depan'> Ya, saya akan
                                    mulai
                                    bekerja dalam 2 minggu ke depan <span class='hl'>(f10-01)</span><br />
                                    <input type='radio' required name='p_job_hunting_status' class='inp-f10'
                                        value='Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan'> Ya,
                                    tapi
                                    saya belum pasti akan bekerja dalam 2 minggu ke depan <span
                                        class='hl'>(f10-01)</span><br />
                                    <input type='radio' required name='p_job_hunting_status' class='inp-f10'
                                        value='Lainnya' id='inp-f1001-lainnya'>Lainnya: <input type='text'
                                        name='p_job_hunting_remark' id='inp-f1002'>
                                    <span class='hl'>(f10-01 - f10-02)</span><br />
                                </td>
                            </tr>
                            <tr id='p_compatibility' class='tr-quis'>
                                <td valign='top'>Jika menurut Anda pekerjaan Anda saat ini tidak sesuai dengan
                                    pendidikan
                                    Anda, mengapa Anda mengambilnya?<br /> * Jika belum/tidak bekerja, silakan pilih
                                    Lainnya
                                    dan jelaskan alasan tidak/belum bekerja </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='checkbox' name='p_compatibility_type[0]' class='inp-f16'
                                        value='Pertanyaan tidak sesuai, pekerjaan saya saat ini sudah sesuai dengan pendidikan saya'>
                                    Pertanyaan tidak sesuai, pekerjaan saya saat ini sudah sesuai dengan pendidikan saya
                                    <span class='hl'>(f1601)</span><br />
                                    <input type='checkbox' name='p_compatibility_type[1]' class='inp-f16'
                                        value='Saya belum mendapatkan pekerjaan yang lebih sesuai dengan pendidikan saya'>
                                    Saya belum mendapatkan pekerjaan yang lebih sesuai dengan pendidikan saya <span
                                        class='hl'>(f1602)</span><br />
                                    <input type='checkbox' name='p_compatibility_type[2]' class='inp-f16'
                                        value='Di pekerjaan ini saya memperoleh prospek karir yang baik'> Di pekerjaan
                                    ini
                                    saya memperoleh prospek karir yang baik <span class='hl'>(f1603)</span><br />
                                    <input type='checkbox' name='p_compatibility_type[3]' class='inp-f16'
                                        value='Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya '>
                                    Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan
                                    pendidikan
                                    saya <span class='hl'>(f1604)</span><br />
                                    <input type='checkbox' name='p_compatibility_type[4]' class='inp-f16'
                                        value='Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya'>
                                    Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding
                                    posisi sebelumnya <span class='hl'>(f1605)</span><br />
                                    <input type='checkbox' name='p_compatibility_type[5]' class='inp-f16'
                                        value='Saya dapat memperoleh pendapatan yang lebih tinggi di pekerjaan ini'>
                                    Saya
                                    dapat memperoleh pendapatan yang lebih tinggi di pekerjaan ini <span
                                        class='hl'>(f1606)</span><br />
                                    <input type='checkbox' name='p_compatibility_type[6]' class='inp-f16'
                                        value='Pekerjaan saya saat ini lebih aman/terjamin/secure'> Pekerjaan saya
                                    saat ini
                                    lebih aman/terjamin/secure <span class='hl'>(f1607)</span><br />
                                    <input type='checkbox' name='p_compatibility_type[7]' class='inp-f16'
                                        value='Pekerjaan saya saat ini lebih menarik'> Pekerjaan saya saat ini lebih
                                    menarik
                                    <span class='hl'>(f1608)</span><br />
                                    <input type='checkbox' name='p_compatibility_type[8]' class='inp-f16'
                                        value='Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll'>
                                    Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal
                                    yang
                                    fleksibel, dll <span class='hl'>(f1609)</span><br />
                                    <input type='checkbox' name='p_compatibility_type[9]' class='inp-f16'
                                        value='Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya'>
                                    Pekerjaan
                                    saya saat ini lokasinya lebih dekat dari rumah saya <span
                                        class='hl'>(f1610)</span><br />
                                    <input type='checkbox' name='p_compatibility_type[10]'
                                        class='inp-f16'
                                        value='Pekerjaan saya saat ini dpt lebih menjamin kebutuhan keluarga'>
                                    Pekerjaan
                                    saya saat ini dpt lebih menjamin kebutuhan keluarga <span
                                        class='hl'>(f1611)</span><br />
                                    <input type='checkbox' name='p_compatibility_type[11]'
                                        class='inp-f16'
                                        value='Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya'>
                                    Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan
                                    dengan
                                    pendidikan saya <span class='hl'>(f1612)</span><br />
                                    <input type='checkbox' id='inp-f1613a'
                                        name='p_compatibility_type[12]' class='inp-f16' value='Lainnya'>Lainnya:
                                    <input type='text' id='inp-f1613b' name='p_compatibility_remark'> <span
                                        class='hl'>(f1613a - f1613b)</span><br />
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

            @if ($currentStep == 1)
                <div></div>
            @endif

            @if ($currentStep == 2)
                <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back</button>
            @endif

            @if ($currentStep == 1)
                <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
            @endif

            @if ($currentStep == 2)
                <button type="submit" class="btn btn-md btn-primary">Submit</button>
            @endif
        </div>
    </form>
</div>

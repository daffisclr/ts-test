@extends('layouts.admin')

@section('main-content')

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
        </script>

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <style type='text/css'>
            .h {
                font-weight: bold;
                vertical-align: top;
                color: red
            }

            .hl {
                font-size: 8px;
                font-weight: bold;
                vertical-align: top;
                color: red
            }

            .i {
                font-weight: bold;
                vertical-align: top;
            }

            .desc {
                display: none;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-xl-10 ">
                    <div class="row justify-content-center">
                        <div class="container">
                            <form id="contact-form" name="contactform" method="post" action="" role="form">
                                <div class="row">

                                    <br><br>

                                    <table class='table table-striped table-responsive'>
                                        <tr>
                                            <td colspan='4'><b>Tracer Study</td>
                                        </tr>
                                        <tr id='f8'>
                                            <td valign='top'>Jelaskan status Anda saat ini?</td>
                                            <td valign='top' style='width:5px;'>:</td>
                                            <td>
                                                <input type='radio' name='f8' value='Bekerja (fulltime / part time)'
                                                    no_urut='1' required> [1] Bekerja (fulltime / part time) <span
                                                    class='hl'>(f8)</span><br />
                                                <input type='radio' name='f8' value='Wiraswasta' no_urut='2'
                                                    required>
                                                [3] Wiraswasta<br />
                                                <input type='radio' name='f8' value='Melanjutkan Pendidikan'
                                                    no_urut='3' required> [4] Melanjutkan Pendidikan <br />
                                                <input type='radio' name='f8'
                                                    value='Tidak Kerja tetapi sedang mencari kerja' no_urut='4' required>
                                                [5] Tidak Kerja tetapi sedang mencari kerja<br />
                                                <input type='radio' name='f8'
                                                    value='Belum memungkinkan bekerja (Menikah/wajib militer/mengurus keluarga)'
                                                    no_urut='5' required> [2] Belum memungkinkan bekerja (Menikah/wajib
                                                militer/mengurus keluarga) <br />
                                            </td>
                                        </tr>
                                        <!-- 								<tr id='fub401' class='tr-quis'>
                <td valign='top'>Apa posisi/jabatan Anda saat ini?</td>
                <td valign='top'>:</td>
                <td>
                 <input type='text' name='fub401' class='inp-fub401' value=''   > <span class='hl'>(fub401)</span><br />
                </td>
                </tr> -->
                                        <tr id='f5c' class='tr-quis2'>
                                            <td valign='top'>Apa posisi/jabatan Anda saat ini?</td>
                                            <td valign='top'>:</td>
                                            <td>
                                                <input type='radio' name='f5c' class='inp-f5c' value='Founder'
                                                    no_urut='1'>
                                                Founder <span class='hl'>(f5c)</span><br />
                                                <input type='radio' name='f5c' class='inp-f5c' value='Co-Founder'
                                                    no_urut='2'> Co-Founder <span class='hl'>(f5c)</span><br />
                                                <input type='radio' name='f5c' class='inp-f5c' value='Staff'
                                                    no_urut='3'>
                                                Staff <span class='hl'>(f5c)</span><br />
                                                <input type='radio' name='f5c' class='inp-f5c'
                                                    value='Freelance/Kerja Lepas' no_urut='4'> Freelance/Kerja Lepas
                                                <span class='hl'>(f5c)</span><br />
                                            </td>
                                        </tr>
                                        <tr id='f504' class='tr-quis'>
                                            <td valign='top'>Apakah Anda telah mendapatkan pekerjaan/berwiraswasta &lt;=
                                                6 bulan sebelum lulus?</td>
                                            <td valign='top'>:</td>
                                            <td>
                                                <input type='radio' name='f504' class='inp-f504' value='1'
                                                    no_urut='1'>
                                                Ya <span class='hl'>(f5-04)</span><br />
                                                <input type='radio' name='f504' class='inp-f504' value='0'
                                                    no_urut='2'>
                                                Tidak <span class='hl'>(f5-04)</span><br />
                                            </td>
                                        </tr>
                                        <tr id='f502' class='tr-quis'>
                                            <td valign='top'>Dalam berapa bulan Anda mendapatkan pekerjaan/berwiraswasta
                                                setelah lulus? (untuk yg bekerja/berwiraswasta sebelum lulus diisi
                                                0)<br /> * Contoh pengisian : 6 </td>
                                            <td valign='top'>:</td>
                                            <td>
                                                <input type='number' name='f502' class='inp-f502' size='5'
                                                    maxlength='2' value=''
                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                Bulan&nbsp;&nbsp;<span class='hl'>(f5-02)</span>
                                            </td>
                                        </tr>
                                        <tr id='f506' class='tr-quis'>
                                            <td valign='top'>Berapa bulan waktu yang Anda butuhkan untuk mendapatkan
                                                pekerjaan pertama/berwiraswasta ?<br /> * Contoh pengisian : 6 (isikan 0
                                                jika bekerja sebelum lulus)</td>
                                            <td valign='top'>:</td>
                                            <td>
                                                <input type='number' name='f506' class='inp-f506' size='5'
                                                    maxlength='2' value=''
                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                Bulan &nbsp;&nbsp;<span class='hl'>(f5-06)</span>
                                            </td>
                                        </tr>
                                        <!-- 								<tr id='fub2' class='tr-quis'>
                <td valign='top'>Tuliskan identitas atasan Anda: <br/>* jika Anda berwiraswasta, tulis identitas rekan kerja Anda
                </td><td valign='top'>:</td><td>
                  <table class='table table-responsive'>
                  <tr><td>Nama Atasan</td><td> &nbsp;
                   <input type='text' name='fub201' class='inp-fub2' size='30' maxlength='150' ><span class='hl'>(fub201)</span> </td></tr>
                  <tr><td>Jabatan Atasan</td><td> &nbsp;
                   <input type='text' name='fub203' class='inp-fub2' size='30' maxlength='150' ><span class='hl'>(fub203)</span> </td></tr>
                  <tr><td>No Telpon Atasan</td><td> &nbsp;
                   <input type='number' name='fub204' class='inp-fub2' size='30' maxlength='30' ><span class='hl'>(fub204)</span> </td></tr>
                  <tr><td>Email Atasan</td><td>&nbsp;
                   <input type='text' id='inp-email-atasan' name='fub202' class='inp-fub2' size='30' maxlength='100'  onBlur="cekEmailAtasan()"><span class='hl'>(fub202)</span>
                   <div class="help-block with-errors"><p id="salahemail-atasan"></p></div>
                   </td></tr>

                  </table>
                </td>
                </tr> -->
                                        <tr id='f5b' class='tr-quis'>
                                            <td valign='top'>Apa nama perusahaan/kantor tempat Anda
                                                bekerja/berwiraswasta saat ini?
                                            </td>
                                            <td valign='top'>:</td>
                                            <td>
                                                <input type='text' name='f5b' class='inp-f5b' size='30'
                                                    maxlength='255'><span class='hl'>(f5b)</span>
                                            </td>
                                        </tr>
                                        <tr id='f505' class='tr-quis'>
                                            <td valign='top'>Berapa rata-rata pendapatan Anda per bulan? (Take Home Pay)
                                                <br />* Contoh pengisian : 10000000 (tanpa titik)
                                            </td>
                                            <td valign='top'>:</td>
                                            <td>
                                                <input type='number' name='f505' class='inp-f505' size='30'
                                                    maxlength='12'
                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"><span
                                                    class='hl'>(f505)</span>
                                            </td>
                                        </tr>
                                        <tr id='f5a' class='tr-quis'>
                                            <td valign='top'>Dimanakah lokasi tempat Anda bekerja/berwiraswasta?<br />
                                            </td>
                                            <td valign='top'>:</td>
                                            <td>
                                                <table class='table table-responsive'>
                                                    <tr>
                                                        <td>Provinsi</td>
                                                        <td> &nbsp;
                                                            <select id='inp-f5a1' name='f5a1' class='inp-f5a'
                                                                style="width:200px">
                                                                <option value='-'>-- Pilih Provinsi --</option>
                                                            </select><span class='hl'>(f5a1)</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kabupaten</td>
                                                        <td> &nbsp;
                                                            <select id='inp-f5a2' name='f5a2' class='inp-f5a'>
                                                                <option value='-' provinsi='-'>-- Pilih
                                                                    Kabupaten/Kota
                                                                    --</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr id='f11' class='tr-quis'>
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
                                                            <input type='radio' name='f1101' class='inp-f11'
                                                                value='BUMN/BUMD'> Instansi Pemerintah <br />
                                                            <input type='radio' name='f1101' class='inp-f11'
                                                                value='BUMN/BUMD'> BUMN/BUMD<br />
                                                            <input type='radio' name='f1101' class='inp-f11'
                                                                value='Institusi/Organisasi Multilateral'>
                                                            Institusi/Organisasi Multilateral<br />
                                                            <input type='radio' name='f1101' class='inp-f11'
                                                                value='Organisasi non-profit/Lembaga Swadaya Masyarakat'>
                                                            Organisasi non-profit/Lembaga Swadaya Masyarakat<br />
                                                            <input type='radio' name='f1101' class='inp-f11'
                                                                value='Perusahaan swasta'> Perusahaan swasta<br />
                                                            <input type='radio' name='f1101' class='inp-f11'
                                                                value='Wiraswasta/perusahaan sendiri'>
                                                            Wiraswasta/perusahaan sendiri<br />
                                                            <input type='radio' name='f1101' class='inp-f11'
                                                                value='5' id='inp-f11-lainnya'> [5] Lainnya,
                                                            tuliskan:
                                                        </td>
                                                        <td><span class='hl'>(f11-01)</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type='text' name='f1102' value=''
                                                                size='50' maxlength='150' id='inp-f1102'></td>
                                                        <td><span class='hl'>(f11-02)</span></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr id='f5d' class='tr-quis'>
                                            <td valign='top'>Apa tingkat tempat kerja Anda?
                                            </td>
                                            <td valign='top'>:</td>
                                            <td>
                                                <input type='radio' name='f5d' class='inp-f5d'
                                                    value='Lokal/wilayah/wiraswasta tidak berbadan hukum'>
                                                Lokal/wilayah/wiraswasta tidak berbadan hukum <span
                                                    class='hl'>(f5d)</span><br />
                                                <input type='radio' name='f5d' class='inp-f5d'
                                                    value='Nasional/wiraswasta berbadan hukum'> Nasional/wiraswasta
                                                berbadan hukum<br />
                                                <input type='radio' name='f5d' class='inp-f5d'
                                                    value='Multinasional/internasional'> Multinasional/internasional
                                                <br />
                                            </td>
                                        </tr>

                                        <tr id='f19' class='tr-quis4'>
                                            <td valign='top'>Dimanakah lokasi Anda melanjutkan studi?
                                            </td>
                                            <td valign='top'>:</td>
                                            <td>
                                                <table class='table table-striped table-responsive'>
                                                    <tr>
                                                        <td>
                                                            <input type='radio' name='f19a' class='inp-f19'
                                                                value='Dalam Negeri'> Dalam Negeri <br />
                                                            <input type='radio' name='f19a' class='inp-f19'
                                                                value='Luar Negeri'> Luar Negeri, tuliskan:<br />
                                                        </td>
                                                        <td><span class='hl'>(f19a)</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type='text' name='f19b' value=''
                                                                size='50' maxlength='50'></td>
                                                        <td><span class='hl'>(f19b)</span></td>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr id='f18' class='tr-quis4'>
                                            <td valign='top'>Darimanakah sumber biaya studi lanjut Anda?
                                            </td>
                                            <td valign='top'>:</td>
                                            <td>
                                                <table class='table table-striped table-responsive'>
                                                    <tr>
                                                        <td>
                                                            <input type='radio' name='f18a' class='inp-f18'
                                                                value='Biaya Sendiri'> Biaya Sendiri <br />
                                                            <input type='radio' name='f18a' class='inp-f18'
                                                                value='Beasiswa'> Beasiswa, tuliskan:<br />
                                                        </td>
                                                        <td><span class='hl'>(f18a)</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type='text' name='f18b' value=''
                                                                size='50' maxlength='150' /></td>
                                                        <td><span class='hl'>(fub304)</span></td>
                                                </table>
                                            </td>
                                        </tr>

                                        <tr id='f18e' class='tr-quis4'>
                                            <td valign='top'>Kapankah Anda memulai studi lanjut?
                                            </td>
                                            <td valign='top'>:</td>
                                            <td>
                                                <input type='text' name='f18e' class='datepicker inp-f18e'
                                                    value='' maxlength='30' /><span class='hl'>(f18d)</span>
                                            </td>
                                        </tr>

                                        <tr id='f18c' class='tr-quis4'>
                                            <td valign='top'>Apa nama Perguruan Tinggi tempat Anda melanjutkan studi?
                                                <br />* Contoh pengisian : PNJ
                                            </td>
                                            <td valign='top'>:</td>
                                            <td>
                                                <input type='text' name='f18c' class='inp-f18c' value=''
                                                    maxlength='150' /><span class='hl'>(f18b)</span>
                                            </td>
                                        </tr>

                                        <tr id='f18d' class='tr-quis4'>
                                            <td valign='top'>Apa nama program studi yang Anda ambil dalam melanjutkan
                                                studi? <br /> * Contoh pengisian : Magister Ilmu Hukum
                                            </td>
                                            <td valign='top'>:</td>
                                            <td>
                                                <input type='text' name='f18d' class='inp-f18d' value=''
                                                    maxlength='150' /><span class='hl'>(f18c)</span>
                                            </td>
                                        </tr>

                                        <tr id='f18f' class='tr-quis4'>
                                            <td valign='top'>Apa alasan Anda melanjutkan studi? <span
                                                    class='hl'>(fub305)</span>
                                            </td>
                                            <td valign='top'>:</td>
                                            <td>
                                                <input type='radio' name='f18f' class='inp-f18f'
                                                    value='Tuntutan profesi'>
                                                Tuntutan profesi <br />
                                                <input type='radio' name='f18f' class='inp-f18f'
                                                    value='Kesempatan beasiswa'> Kesempatan beasiswa <br />
                                                <input type='radio' name='f18f' class='inp-f18f' value='Prestise'>
                                                Prestise <br />
                                                <input type='radio' name='f18f' class='inp-f18f'
                                                    value='Belum ada keinginan untuk bekerja'> Belum ada keinginan untuk
                                                bekerja <br />
                                            </td>
                                        </tr>

                                        <tr id='f12' class='tr-quis'>
                                            <td valign='top'>Sebutkan sumberdana dalam pembiayaan kuliah?</td>
                                            <td valign='top'>:</td>
                                            <td>
                                                <table class='table table-striped table-responsive'>
                                                    <tr>
                                                        <td>
                                                            <input type='radio' name='f1201' class='inp-f12'
                                                                value='1'>
                                                            [1] Biaya Sendiri / Keluarga<br />
                                                            <input type='radio' name='f1201' class='inp-f12'
                                                                value='2'>
                                                            [2] Beasiswa ADik (Afirmasi Pendidikan Tinggi)<br />
                                                            <input type='radio' name='f1201' class='inp-f12'
                                                                value='3'>
                                                            [3] Beasiswa KIP-K (Kartu Indonesia Pintar
                                                            Kuliah)/Bidikmisi<br />
                                                            <input type='radio' name='f1201' class='inp-f12'
                                                                value='4'>
                                                            [4] Beasiswa PPA (Peningkatan Prestasi Akademik)<br />
                                                            <input type='radio' name='f1201' class='inp-f12'
                                                                value='5'>
                                                            [5] Beasiswa AFIRMASI<br />
                                                            <input type='radio' name='f1201' class='inp-f12'
                                                                value='6'>
                                                            [6] Beasiswa Perusahaan/Swasta<br />
                                                            <input type='radio' name='f1201' class='inp-f12'
                                                                value='7' id='inp-f1201-lainnya'> [7] Lainnya,
                                                            tuliskan:
                                                        </td>
                                                        <td><span class='hl'>(f12-01)</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type='text' name='f1202' value=''
                                                                size='50' maxlength='150' id='inp-f1202'></td>
                                                        <td><span class='hl'>(f12-02)</span></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                            </form>
                            </td>
                            </tr>
                            <tr id='f14' class='tr-quis'>

                                <td valign='top'>Seberapa erat hubungan antara bidang studi dengan pekerjaan anda? <br />
                                    *
                                    Jika belum/tidak bekerja, isi Tidak Sama Sekali</td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='radio' name='f14' class='inp-f14' value='1'> [1] Sangat Erat
                                    <span class='hl'>(f14)</span><br />
                                    <input type='radio' name='f14' class='inp-f14' value='2'> [2] Erat<br />
                                    <input type='radio' name='f14' class='inp-f14' value='3'> [3] Cukup
                                    Erat<br />
                                    <input type='radio' name='f14' class='inp-f14' value='4'> [4] Kurang
                                    Erat<br />
                                    <input type='radio' name='f14' class='inp-f14' value='5'> [5] Tidak Sama
                                    Sekali <br />
                                </td>
                            </tr>

                            <tr id='f15' class='tr-quis'>
                                <td valign='top'>
                                    Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?
                                </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='radio' name='f15' class='inp-f15' value='1'> [1] Setingkat
                                    Lebih Tinggi
                                    <span class='hl'>(f15)</span><br />
                                    <input type='radio' name='f15' class='inp-f15' value='2'> [2] Tingkat
                                    yang Sama<br />
                                    <input type='radio' name='f15' class='inp-f15' value='3'> [3] Setingkat
                                    Lebih
                                    Rendah<br />
                                    <input type='radio' name='f15' class='inp-f15' value='4'> [4] Tidak Perlu
                                    Pendidikan
                                    Tinggi<br />
                                </td>
                            </tr>


                            <!-- 							<tr id='f3' class='tr-quis'>
                <td valign='top'>Kapankah Anda mulai mencari pekerjaan?<br/>
                     *Mohon pekerjaan sambilan tidak dimasukkan<br/> * Contoh pengisian : 6</td>
                <td valign='top'>:</td>
                <td>
                 <input type='radio' name='f301' class='inp-f3' value='Sebelum Lulus' > Kira-kira <input name='f302' type='number' value='' maxlength='2' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/> bulan sebelum lulus <span class='hl'>(f302)</span><br />
                 <input type='radio' name='f301' class='inp-f3' value='Setelah Lulus' > Kira-kira <input name='f303' type='number' value='' maxlength='2' oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/> setelah lulus <span class='hl'>(f303)</span><br />
                 <input type='radio' name='f301' class='inp-f3' value='Saya tidak mencari kerja' >Saya tidak mencari kerja <span class='hl'>(f301)</span><br />
                </td>
               </tr> -->

                            <tr id='f17' class='tr-quis'>
                                <td valign='top'>
                                    (A)Pada saat lulus, pada tingkat mana kompetensi di bawah ini yang Anda kuasai? <br />
                                    (B) Pada saat ini, pada tingkat mana kompetensi di bawah ini diperlukan dalam pekerjaan?
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
                                            <td><input type='radio' name='f1701a' class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' name='f1701a' class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' name='f1701a' class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' name='f1701a' class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' name='f1701a' class='inp-f17' value='5'>
                                            </td>
                                            <td>Etika <span class='hl'>f17-01a f17-01b</span></td>
                                            <td><input type='radio' name='f1701b' class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' name='f1701b' class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' name='f1701b' class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' name='f1701b' class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' name='f1701b' class='inp-f17' value='5'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type='radio' name='f1702a' class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' name='f1702a' class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' name='f1702a' class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' name='f1702a' class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' name='f1702a' class='inp-f17' value='5'>
                                            </td>
                                            <td>Keahlian berdasarkan bidang ilmu <span class='hl'>f17-02a
                                                    f17-02b</span>
                                            </td>
                                            <td><input type='radio' name='f1702b' class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' name='f1702b' class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' name='f1702b' class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' name='f1702b' class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' name='f1702b' class='inp-f17' value='5'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type='radio' name='f1703a' class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' name='f1703a' class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' name='f1703a' class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' name='f1703a' class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' name='f1703a' class='inp-f17' value='5'>
                                            </td>
                                            <td>Bahasa Inggris <span class='hl'>f17-03a f17-03b</span></td>
                                            <td><input type='radio' name='f1703b' class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' name='f1703b' class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' name='f1703b' class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' name='f1703b' class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' name='f1703b' class='inp-f17' value='5'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type='radio' name='f1704a' class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' name='f1704a' class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' name='f1704a' class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' name='f1704a' class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' name='f1704a' class='inp-f17' value='5'>
                                            </td>
                                            <td>Penggunaan Teknologi Informasi <span class='hl'>f17-04a f17-04b</span>
                                            </td>
                                            <td><input type='radio' name='f1704b' class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' name='f1704b' class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' name='f1704b' class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' name='f1704b' class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' name='f1704b' class='inp-f17' value='5'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type='radio' name='f1705a' class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' name='f1705a' class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' name='f1705a' class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' name='f1705a' class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' name='f1705a' class='inp-f17' value='5'>
                                            </td>
                                            <td>Komunikasi <span class='hl'>f17-05a f17-05b</span></td>
                                            <td><input type='radio' name='f1705b' class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' name='f1705b' class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' name='f1705b' class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' name='f1705b' class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' name='f1705b' class='inp-f17' value='5'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type='radio' name='f1706a' class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' name='f1706a' class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' name='f1706a' class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' name='f1706a' class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' name='f1706a' class='inp-f17' value='5'>
                                            </td>
                                            <td>Kerja sama tim <span class='hl'>f17-06a f17-06b</span></td>
                                            <td><input type='radio' name='f1706b' class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' name='f1706b' class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' name='f1706b' class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' name='f1706b' class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' name='f1706b' class='inp-f17' value='5'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type='radio' name='f1707a' class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' name='f1707a' class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' name='f1707a' class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' name='f1707a' class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' name='f1707a' class='inp-f17' value='5'>
                                            </td>
                                            <td>Pengembangan diri <span class='hl'>f17-07a f17-07b</span></td>
                                            <td><input type='radio' name='f1707b' class='inp-f17' value='1'>
                                            </td>
                                            <td><input type='radio' name='f1707b' class='inp-f17' value='2'>
                                            </td>
                                            <td><input type='radio' name='f1707b' class='inp-f17' value='3'>
                                            </td>
                                            <td><input type='radio' name='f1707b' class='inp-f17' value='4'>
                                            </td>
                                            <td><input type='radio' name='f1707b' class='inp-f17' value='5'>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr id='f2' class='tr-quis'>
                                <td valign='top'>Menurut Anda seberapa besar penekanan pada metode pembelajaran di bawah
                                    ini
                                    ketika dilaksanakan di program studi Anda di UB?</td>
                                <td valign='top'>:</td>
                                <td>
                                    <table class='table table-striped table-responsive'>
                                        <tr>
                                            <td>Perkuliahan</td>
                                            <td> :</td>
                                            <td>
                                                <input type='radio' name='f201' class='inp-f2'
                                                    value='Sangat Besar'> Sangat
                                                Besar <span class='hl'>(f201)</span> <br />
                                                <input type='radio' name='f201' class='inp-f2' value='Besar'>
                                                Besar <br />
                                                <input type='radio' name='f201' class='inp-f2' value='Cukup Besar'>
                                                Cukup
                                                Besar <br />
                                                <input type='radio' name='f201' class='inp-f2' value='Kurang'>
                                                Kurang <br />
                                                <input type='radio' name='f201' class='inp-f2'
                                                    value='Tidak Sama Sekali'>
                                                Tidak Sama Sekali <br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Demonstrasi</td>
                                            <td> :</td>
                                            <td>
                                                <input type='radio' name='f202' class='inp-f2'
                                                    value='Sangat Besar'> Sangat
                                                Besar <span class='hl'>(f202)</span> <br />
                                                <input type='radio' name='f202' class='inp-f2' value='Besar'>
                                                Besar <br />
                                                <input type='radio' name='f202' class='inp-f2' value='Cukup Besar'>
                                                Cukup
                                                Besar <br />
                                                <input type='radio' name='f202' class='inp-f2' value='Kurang'>
                                                Kurang <br />
                                                <input type='radio' name='f202' class='inp-f2'
                                                    value='Tidak Sama Sekali'>
                                                Tidak Sama Sekali <br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Partisipasi dalam proyek riset</td>
                                            <td> :</td>
                                            <td>
                                                <input type='radio' name='f203' class='inp-f2'
                                                    value='Sangat Besar'> Sangat
                                                Besar <span class='hl'>(f203)</span> <br />
                                                <input type='radio' name='f203' class='inp-f2' value='Besar'>
                                                Besar <br />
                                                <input type='radio' name='f203' class='inp-f2' value='Cukup Besar'>
                                                Cukup
                                                Besar <br />
                                                <input type='radio' name='f203' class='inp-f2' value='Kurang'>
                                                Kurang <br />
                                                <input type='radio' name='f203' class='inp-f2'
                                                    value='Tidak Sama Sekali'>
                                                Tidak Sama Sekali <br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Magang</td>
                                            <td> :</td>
                                            <td>
                                                <input type='radio' name='f204' class='inp-f2'
                                                    value='Sangat Besar'> Sangat
                                                Besar <span class='hl'>(f204)</span> <br />
                                                <input type='radio' name='f204' class='inp-f2' value='Besar'>
                                                Besar <br />
                                                <input type='radio' name='f204' class='inp-f2' value='Cukup Besar'>
                                                Cukup
                                                Besar <br />
                                                <input type='radio' name='f204' class='inp-f2' value='Kurang'>
                                                Kurang <br />
                                                <input type='radio' name='f204' class='inp-f2'
                                                    value='Tidak Sama Sekali'>
                                                Tidak Sama Sekali <br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Praktikum</td>
                                            <td> :</td>
                                            <td>
                                                <input type='radio' name='f205' class='inp-f2'
                                                    value='Sangat Besar'> Sangat
                                                Besar <span class='hl'>(f205)</span> <br />
                                                <input type='radio' name='f205' class='inp-f2' value='Besar'>
                                                Besar <br />
                                                <input type='radio' name='f205' class='inp-f2' value='Cukup Besar'>
                                                Cukup
                                                Besar <br />
                                                <input type='radio' name='f205' class='inp-f2' value='Kurang'>
                                                Kurang <br />
                                                <input type='radio' name='f205' class='inp-f2'
                                                    value='Tidak Sama Sekali'>
                                                Tidak Sama Sekali <br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kerja lapangan</td>
                                            <td> :</td>
                                            <td>
                                                <input type='radio' name='f206' class='inp-f2'
                                                    value='Sangat Besar'> Sangat
                                                Besar <span class='hl'>(f206)</span> <br />
                                                <input type='radio' name='f206' class='inp-f2' value='Besar'>
                                                Besar <br />
                                                <input type='radio' name='f206' class='inp-f2' value='Cukup Besar'>
                                                Cukup
                                                Besar <br />
                                                <input type='radio' name='f206' class='inp-f2' value='Kurang'>
                                                Kurang <br />
                                                <input type='radio' name='f206' class='inp-f2'
                                                    value='Tidak Sama Sekali'>
                                                Tidak Sama Sekali <br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Diskusi</td>
                                            <td> :</td>
                                            <td>
                                                <input type='radio' name='f207' class='inp-f2'
                                                    value='Sangat Besar'> Sangat
                                                Besar <span class='hl'>(f207)</span> <br />
                                                <input type='radio' name='f207' class='inp-f2' value='Besar'>
                                                Besar <br />
                                                <input type='radio' name='f207' class='inp-f2' value='Cukup Besar'>
                                                Cukup
                                                Besar <br />
                                                <input type='radio' name='f207' class='inp-f2' value='Kurang'>
                                                Kurang <br />
                                                <input type='radio' name='f207' class='inp-f2'
                                                    value='Tidak Sama Sekali'>
                                                Tidak Sama Sekali <br />
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr id='f3' class='tr-quis'>
                                <td valign='top'>Kapankah Anda mulai mencari pekerjaan?<br />
                                    *Mohon pekerjaan sambilan tidak dimasukkan<br /> * Contoh pengisian : 6</td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='radio' name='f301' class='inp-f3' value='Sebelum Lulus'> Kira-kira
                                    <input name='f302' type='number' value='' maxlength='2'
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                                    bulan sebelum lulus <span class='hl'>(f302)</span><br />
                                    <input type='radio' name='f301' class='inp-f3' value='Setelah Lulus'> Kira-kira
                                    <input name='f303' type='number' value='' maxlength='2'
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                                    setelah lulus <span class='hl'>(f303)</span><br />
                                    <input type='radio' name='f301' class='inp-f3'
                                        value='Saya tidak mencari kerja'>Saya
                                    tidak mencari kerja <span class='hl'>(f301)</span><br />
                                </td>
                            </tr>
                            <tr id='f4' class='tr-quis'>
                                <td valign='top'>Bagaimanakah Anda mencari pekerjaan tersebut?<br />
                                    Jawaban bisa lebih dari satu </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='checkbox' name='f401' class='inp-f4'
                                        value='Melalui iklan di koran/majalah, brosur'> Melalui iklan di koran/majalah,
                                    brosur <span class='hl'>(f401)</span><br />
                                    <input type='checkbox' name='f402' class='inp-f4'
                                        value='Melamar ke perusahaan tanpa mengatuhi lowongan yang ada'> Melamar ke
                                    perusahaan tanpa mengatuhi lowongan yang ada <span class='hl'>(f402)</span><br />
                                    <input type='checkbox' name='f403' class='inp-f4'
                                        value='Pergi ke bursa/pameran kerja'>
                                    Pergi ke bursa/pameran kerja <span class='hl'>(f403)</span><br />
                                    <input type='checkbox' name='f404' class='inp-f4'
                                        value='Mencari lewat internet/iklan online/milis'> Mencari lewat internet/iklan
                                    online/milis <span class='hl'>(f404)</span><br />
                                    <input type='checkbox' name='f405' class='inp-f4'
                                        value='Dihubungi oleh perusahaan'>
                                    Dihubungi oleh perusahaan <span class='hl'>(f405)</span><br />
                                    <input type='checkbox' name='f406' class='inp-f4'
                                        value='Menghubungi Kemenakertrans'>
                                    Menghubungi Kemenakertrans <span class='hl'>(f406)</span><br />
                                    <input type='checkbox' name='f407' class='inp-f4'
                                        value='Menghubungi agen tenaga kerja komersial/swasta'> Menghubungi agen tenaga
                                    kerja komersial/swasta <span class='hl'>(f407)</span><br />
                                    <input type='checkbox' name='f408' class='inp-f4'
                                        value='Memperoleh informasi dari pusat pengembangan karir fakultas/universitas'>
                                    Memperoleh informasi dari pusat pengembangan karir fakultas/universitas <span
                                        class='hl'>(f408)</span><br />
                                    <input type='checkbox' name='f409' class='inp-f4'
                                        value='Menghubungi kantor kemahasiswaan/hubungan alumni'> Menghubungi kantor
                                    kemahasiswaan/hubungan alumni <span class='hl'>(f409)</span><br />
                                    <input type='checkbox' name='f410' class='inp-f4'
                                        value='Membangun jejaring (network) sejak masih kuliah'> Membangun jejaring
                                    (network) sejak masih kuliah <span class='hl'>(f410)</span><br />
                                    <input type='checkbox' name='f411' class='inp-f4'
                                        value='Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll)'> Melalui
                                    relasi (misalnya dosen, orang tua, saudara, teman, dll) <span
                                        class='hl'>(f411)</span><br />
                                    <input type='checkbox' name='f412' class='inp-f4'
                                        value='Membangun bisnis sendiri'>
                                    Membangun bisnis sendiri <span class='hl'>(f412)</span><br />
                                    <input type='checkbox' name='f413' class='inp-f4'
                                        value='Melalui penempatan kerja atau magang'> Melalui penempatan kerja atau magang
                                    <span class='hl'>(f413)</span><br />
                                    <input type='checkbox' name='f414' class='inp-f4'
                                        value='Bekerja di tempat yang sama dengan tempat kerja semasa kuliah'> Bekerja di
                                    tempat yang sama dengan tempat kerja semasa kuliah <span
                                        class='hl'>(f414)</span><br />
                                    <input type='checkbox' id='inp-f415a' name='f415a' class='inp-f4'
                                        value='Lainnya'>Lainnya: <input type='text' id='inp-f415b' name='f415b'
                                        maxlength='150'> <span class='hl'>(f415a - f415b)</span><br />
                                </td>
                            </tr>
                            <tr id='f6' class='tr-quis'>
                                <td valign='top'>Berapa perusahaan/instansi/institusi yang sudah Anda lamar (lewat surat
                                    atau email) sebelum Anda memperoleh pekerjaan? <br /> * Contoh pengisian : 10</td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='number' name='f6' class='inp-f6' size='5'
                                        value='' maxlength='3'
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    perusahaan/instansi/institusi
                                </td>
                            </tr>
                            <tr id='f7' class='tr-quis'>
                                <td valign='top'>Berapa banyak perusahaan/instansi/institusi yang merespon lamaran
                                    Anda?<br />* Contoh pengisian : 7 </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='number' name='f7' class='inp-f7' size='5'
                                        value='' maxlength='3'
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    perusahaan/instansi/institusi
                                </td>
                            </tr>
                            <tr id='f7a' class='tr-quis'>
                                <td valign='top'>Berapa banyak perusahaan/instansi/institusi yang mengundang Anda untuk
                                    wawancara?<br /> Contoh pengisian : 3 </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='number' name='f7a' class='inp-f7a' size='5'
                                        value='' maxlength='3'
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    perusahaan/instansi/institusi
                                </td>
                            </tr>
                            <tr id='f10' class='tr-quis'>
                                <td valign='top'>Apakah Anda aktif mencari pekerjaan dalam 4 minggu terakhir? </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='radio' name='f1001' class='inp-f10' value='Tidak'> Tidak <span
                                        class='hl'>(f10-01)</span><br />
                                    <input type='radio' name='f1001' class='inp-f10'
                                        value='Tidak, tapi saya sedang menunggu hasil lamaran kerja'> Tidak, tapi saya
                                    sedang menunggu hasil lamaran kerja <span class='hl'>(f10-01)</span><br />
                                    <input type='radio' name='f1001' class='inp-f10'
                                        value='Ya, saya akan mulai bekerja dalam 2 minggu ke depan'> Ya, saya akan mulai
                                    bekerja dalam 2 minggu ke depan <span class='hl'>(f10-01)</span><br />
                                    <input type='radio' name='f1001' class='inp-f10'
                                        value='Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan'> Ya, tapi
                                    saya belum pasti akan bekerja dalam 2 minggu ke depan <span
                                        class='hl'>(f10-01)</span><br />
                                    <input type='radio' name='f1001' class='inp-f10' value='Lainnya'
                                        id='inp-f1001-lainnya'>Lainnya: <input type='text' name='f1002'
                                        id='inp-f1002'>
                                    <span class='hl'>(f10-01 - f10-02)</span><br />
                                </td>
                            </tr>
                            <tr id='f16' class='tr-quis'>
                                <td valign='top'>Jika menurut Anda pekerjaan Anda saat ini tidak sesuai dengan
                                    pendidikan
                                    Anda, mengapa Anda mengambilnya?<br /> * Jika belum/tidak bekerja, silakan pilih Lainnya
                                    dan jelaskan alasan tidak/belum bekerja </td>
                                <td valign='top'>:</td>
                                <td>
                                    <input type='checkbox' name='f1601' class='inp-f16'
                                        value='Pertanyaan tidak sesuai, pekerjaan saya saat ini sudah sesuai dengan pendidikan saya'>
                                    Pertanyaan tidak sesuai, pekerjaan saya saat ini sudah sesuai dengan pendidikan saya
                                    <span class='hl'>(f1601)</span><br />
                                    <input type='checkbox' name='f1602' class='inp-f16'
                                        value='Saya belum mendapatkan pekerjaan yang lebih sesuai dengan pendidikan saya'>
                                    Saya belum mendapatkan pekerjaan yang lebih sesuai dengan pendidikan saya <span
                                        class='hl'>(f1602)</span><br />
                                    <input type='checkbox' name='f1603' class='inp-f16'
                                        value='Di pekerjaan ini saya memperoleh prospek karir yang baik'> Di pekerjaan ini
                                    saya memperoleh prospek karir yang baik <span class='hl'>(f1603)</span><br />
                                    <input type='checkbox' name='f1604' class='inp-f16'
                                        value='Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya '>
                                    Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan
                                    saya <span class='hl'>(f1604)</span><br />
                                    <input type='checkbox' name='f1605' class='inp-f16'
                                        value='Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya'>
                                    Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding
                                    posisi sebelumnya <span class='hl'>(f1605)</span><br />
                                    <input type='checkbox' name='f1606' class='inp-f16'
                                        value='Saya dapat memperoleh pendapatan yang lebih tinggi di pekerjaan ini'> Saya
                                    dapat memperoleh pendapatan yang lebih tinggi di pekerjaan ini <span
                                        class='hl'>(f1606)</span><br />
                                    <input type='checkbox' name='f1607' class='inp-f16'
                                        value='Pekerjaan saya saat ini lebih aman/terjamin/secure'> Pekerjaan saya saat
                                    ini
                                    lebih aman/terjamin/secure <span class='hl'>(f1607)</span><br />
                                    <input type='checkbox' name='f1608' class='inp-f16'
                                        value='Pekerjaan saya saat ini lebih menarik'> Pekerjaan saya saat ini lebih
                                    menarik
                                    <span class='hl'>(f1608)</span><br />
                                    <input type='checkbox' name='f1609' class='inp-f16'
                                        value='Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll'>
                                    Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang
                                    fleksibel, dll <span class='hl'>(f1609)</span><br />
                                    <input type='checkbox' name='f1610' class='inp-f16'
                                        value='Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya'> Pekerjaan
                                    saya saat ini lokasinya lebih dekat dari rumah saya <span
                                        class='hl'>(f1610)</span><br />
                                    <input type='checkbox' name='f1611' class='inp-f16'
                                        value='Pekerjaan saya saat ini dpt lebih menjamin kebutuhan keluarga'> Pekerjaan
                                    saya saat ini dpt lebih menjamin kebutuhan keluarga <span
                                        class='hl'>(f1611)</span><br />
                                    <input type='checkbox' name='f1612' class='inp-f16'
                                        value='Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya'>
                                    Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan
                                    pendidikan saya <span class='hl'>(f1612)</span><br />
                                    <input type='checkbox' id='inp-f1613a' name='f1613a' class='inp-f16'
                                        value='Lainnya'>Lainnya: <input type='text' id='inp-f1613b'
                                        name='f1613b'> <span class='hl'>(f1613a - f1613b)</span><br />
                                </td>
                            </tr>
                            </table>
                        </div>
                        </form>

                        <div class="row">
                            <div class="col-md-4">
                                <!-- <input type="submit" class="btn btn-success btn-send" value="Melanjutkan ke pertanyaan"> -->
                                <button onclick="form_submit()" id="kirim" name='kirim' value="kirim"
                                    class="btn btn-success btn-send"><i class="fa fa-tag"></i>Simpan</button>
                                <!-- <input type="submit" value="Go to Doorway"> -->
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted">
                                    <strong>*</strong> Harus diisi.
                                </p>
                            </div>
                        </div>
                    </div>





                    <div id="result"></div>

                </div>
                <!-- /.8 -->

            </div>
            <!-- /.row-->

        </div>
        <!-- /.container-->





        <script>
            $(document).ready(function() {
                $('.tr-quis').hide();
                $('.tr-quis input').removeAttr('required');
                $('.tr-quis1').hide();
                $('.tr-quis1 input').removeAttr('required');
                $('.tr-quis2').hide();
                $('.tr-quis2 input').removeAttr('required');
                $('.tr-quis4').hide();
                $('.tr-quis4 input').removeAttr('required');

                $('.datepicker').datepicker({
                    dateFormat: 'yy-mm-dd'
                });
                $('#inp-f5a1').select2();
            });

            $('input[name="f8"]').change(function() {

                if ($(this).attr('no_urut') == '1') {
                    /*$('.tr-quis').hide();
                    $('.tr-quis input').removeAttr('required');
                    $('#f504').show();
                    $('.inp-f504').attr('required',true);
                    $('input[name="f504"]').change();*/
                    $('.tr-quis').show();
                    $('.tr-quis input').attr('required', true);
                    $('.tr-quis1').show();
                    $('.tr-quis1 input').attr('required', true);
                    $('.tr-quis2').hide();
                    $('.tr-quis2 input').removeAttr('required');
                    $('.tr-quis4').hide();
                    $('.tr-quis4 input').removeAttr('required');
                    /* $('#fub401').show();
                    $('.fub401').attr('required',true);
                    $('input[name="fub401"]').change(); */

                } else if ($(this).attr('no_urut') == '2') {

                    $('.tr-quis').show();
                    $('.tr-quis input').attr('required', true);
                    $('.tr-quis1').hide();
                    $('.tr-quis1 input').removeAttr('required');
                    $('.tr-quis2').show();
                    $('.tr-quis2 input').attr('required', true);
                    $('.tr-quis4').hide();
                    $('.tr-quis4 input').removeAttr('required');

                    /* 			$('#f5c').show();
                                $('.inp-f5c').attr('required',true);
                                $('input[name="f5c"]').change(); */

                } else if ($(this).attr('no_urut') == '3') {

                    $('.tr-quis').hide();
                    $('.tr-quis input').removeAttr('required');
                    $('.tr-quis1').hide();
                    $('.tr-quis1 input').removeAttr('required');
                    $('.tr-quis2').hide();
                    $('.tr-quis2 input').removeAttr('required');
                    $('.tr-quis4').show();
                    $('.tr-quis4 input').attr('required', true);

                    /* 			$('#f19').show();
                                $('.inp-f19').attr('required',true);
                                $('input[name="f19a"]').change(); */

                } else {
                    $('.tr-quis').hide();
                    $('.tr-quis input').removeAttr('required');
                    $('.tr-quis').hide();
                    $('.tr-quis input').removeAttr('required');
                    $('.tr-quis1').hide();
                    $('.tr-quis1 input').removeAttr('required');
                    $('.tr-quis2').hide();
                    $('.tr-quis2 input').removeAttr('required');
                    $('.tr-quis4').hide();
                    $('.tr-quis4 input').removeAttr('required');




                    /* 			$('#f12').show();
                                $('input[name="f1201"]').change();
                                $('.inp-f12').attr('required',true); */
                }

            });
            $('input[name="f5c"]').change(function() {
                $('#f504').show();
                $('input[name=f504]').change();
            });
            $('input[name="fub401"]').change(function() {
                $('#f504').show();
                $('input[name=f504]').change();
            });
            $('input[name=f18a]').change(function() {
                $('#f18e').show();
                $('.inp-f18e').attr('required', true);
                $('#f18c').show();
                $('.inp-f18c').attr('required', true);
                $('#f18d').show();
                $('.inp-f18d').attr('required', true);
                $('#f18f').show();
                $('.inp-f18f').attr('required', true);
                $('#f12').show();
                $('.inp-f12').attr('required', true);
                $('input[name=f1201]').change();

            });
            $('input[name="f1201"]').change(function() {
                $('#f14').show();
                $('.inp-f14').attr('required', true);
                $('#f15').show();
                $('.inp-f15').attr('required', true);
                $('#f17').show();
                $('.inp-f17').attr('required', true);
                $('#f2').show();
                $('.inp-f2').attr('required', true);
                $('#f3').show();
                $('.inp-f3').attr('required', true);
                $('#f4').show();
                $('#f6').show();
                $('.inp-f6').attr('required', true);
                $('#f7').show();
                $('.inp-f7').attr('required', true);
                $('#f7a').show();
                $('.inp-f7a').attr('required', true);
                $('#f10').show();
                $('.inp-f10').attr('required', true);
                $('#f16').show();
            });
            $('input[name="f19a"]').change(function() {
                $('#f18').show();
                $('.inp-f18').attr('required', true);
                $('input[name="f18a"]').change();
            });

            $('input[name="f504"]').change(function() {
                if ($(this).attr('no_urut') == '1') {
                    $('#f502').show();
                    $('.inp-f502').attr('required', true);
                    $('#f506').hide();
                    $('.inp-f506').removeAttr('required');
                } else {
                    $('#f502').hide();
                    $('.inp-f502').removeAttr('required');
                    $('#f506').show();
                    $('.inp-f506').attr('required', true);
                }
                $('#fub2').show();
                $('.inp-fub2').attr('required', true);
                $('#f5b').show();
                $('.inp-f5b').attr('required', true);
                $('#f505').show();
                $('.inp-f505').attr('required', true);
                $('#f5a').show();
                $('.inp-f5a').attr('required', true);
                $('#f11').show();
                $('.inp-f11').attr('required', true);
                $('#f5d').show();
                $('.inp-f5d').attr('required', true);
                $('#f12').show();
                $('.inp-f12').attr('required', true);
                $('input[name=f1201]').change();
            });

            $('#inp-f5a1').change(function() {
                var prop = $(this).val();
                $('#inp-f5a2').val('-');
                console.log(prop);
                $('#inp-f5a2').children().each(function() {
                    if ($(this).attr('provinsi') != '-')
                        $(this).remove();
                });
                $('#inp-f5a2tmp').children().each(function() {
                    if ($(this).attr('provinsi') == prop)
                        $('#inp-f5a2').append($(this));
                });
                $('#inp-f5a2').select2();
            });



            function checkform() {
                var f = document.forms["contactform"].elements;
                console.log(f);

                var cansubmit = true;


                for (var i = 0; i < f.length; i++) {
                    if (f[i].value.length == 0) cansubmit = false;
                }

                if (cansubmit) {
                    document.getElementById('submit').disabled = false;
                }
            }


            function form_submit() {
                //document.getElementById("contact-form").submit();
                //var nameValue = document.getElementById("form_nama").value;
                //document.write(nameValue);
                //console.log(nameValue);
                //console.log(document.getElementById("form_no_hp").value);
                //console.log(document.getElementById("form_no_hp").value.length);
                var cansubmit = true;
                var f = document.forms["contactform"].elements;
                console.log(f);

                for (var i = 0; i < f.length; i++) {
                    console.log(i & ':' & f[i].value.length);
                    if (f[i].value.length == 0) cansubmit = false;
                }

                var inpf4cheked = false;
                $('.inp-f4').each(function() {
                    if (this.checked) {
                        inpf4cheked = true;
                        $('.inp-f4').removeAttr('required');
                    }
                })

                if ($('#f4').is(":visible")) {
                    if (inpf4cheked == false) {
                        cansubmit = false;
                        $('#inp-f415a').focus();
                        alert('pertanyaan f4: Bagaimanakah Anda mencari pekerjaan tersebut? belum diisi');
                    }
                }

                var inpf16cheked = false;
                $('.inp-f16').each(function() {
                    if (this.checked) {
                        inpf16cheked = true;
                        $('.inp-f16').removeAttr('required');
                    }
                })

                if ($('#f16').is(":visible")) {
                    if (inpf16cheked == false) {
                        cansubmit = false;
                        $('#inp-f1613a').focus();
                        alert(
                            'pertanyaan f16: Jika menurut Anda pekerjaan Anda saat ini tidak sesuai dengan pendidikan Anda, mengapa Anda mengambilnya? belum diisi'
                            );
                    }
                }

                if (cansubmit) {
                    //document.getElementById('kirim').disabled = false;
                    console.log("bisa kirim");
                    document.getElementById("contact-form").submit();
                }
            }

            //validasi1
            /* 		   $(document).ready(function (){
                            validate();
                            $('#inputName, #inputEmail, #inputTel').change(validate);
                        });

                        function validate(){
                            if ($('#inputName').val().length   >   0   &&
                                $('#inputEmail').val().length  >   0   &&
                                $('#inputTel').val().length    >   0) {
                                $("input[type=submit]").prop("disabled", false);
                            }
                            else {
                                $("input[type=submit]").prop("disabled", true);
                            }
                        } */

            //validasi2
            $('#inp-f1613a').change(function() {
                if ($(this).is(':checked')) {
                    $('#inp-f1613b').attr('required', true);
                } else {
                    $('#inp-f1613b').removeAttr('required');
                }
            });

            $('#inp-f415a').change(function() {
                if ($(this).is(':checked')) {
                    $('#inp-f415b').attr('required', true);
                } else {
                    $('#inp-f415b').removeAttr('required');
                }
            });

            $('.inp-f11').change(function() {
                if ($('#inp-f11-lainnya').is(':checked')) {
                    $('#inp-f1102').attr('required', true);
                } else {
                    $('#inp-f1102').removeAttr('required');
                }
            });

            $('.inp-f12').change(function() {
                if ($('#inp-f1201-lainnya').is(':checked')) {
                    $('#inp-f1202').attr('required', true);
                } else {
                    $('#inp-f1202').removeAttr('required');
                }
            });

            $('.inp-f10').change(function() {
                if ($('#inp-f1001-lainnya').is(':checked')) {
                    $('#inp-f1002').attr('required', true);
                } else {
                    $('#inp-f1002').removeAttr('required');
                }
            });
        </script>


    </body>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tracer Study JTIK</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ url('asset_pnj/Logo_pnj_favicon.jpg') }}" rel="icon">
    <link href="{{ url('asset_pnj/Logo_pnj_icon.jpg') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landingpage/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landingpage/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landingpage/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('landingpage/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landingpage/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landingpage/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('landingpage/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('landingpage/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html">SITS-JTIK</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link   scrollto" href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    <li><a class="getstarted scrollto" href="{{ route('register') }}">Get Started</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->


        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Survey Pengguna Alumni</li>
                </ol>
                <h2>Survey Pengguna Alumni Jurusan Teknik Informatika dan Komputer Politeknik Negeri Jakarta</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        <section id="penggunaalumni" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form action="" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name"><b>Nama Pengguna Alumni</b></label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name"><b>Nama Instansi/Perusahaan/Lembaga</b></label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name"><b>Nama Pengguna Alumni</b></label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name"><b>Jabatan Pengguna Alumni</b></label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name"><b>Nama Alumni JTIK yang dinilai</b></label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name"><b>Prodi</b></label>
                                    <select id="p_alumni_program" name="alumni_program" class="form-control"
                                        required>
                                        <option selected="">Choose...</option>
                                        <option value="1">Teknik Informatika</option>
                                        <option value="2">Teknik Multimedia Jaringan</option>
                                        <option value="3">Teknik Multimedia Digital</option>
                                        <option value="3">Teknik Komputer Jaringan</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name"><b>Jenjang</b></label>
                                    <select id="p_alumni_program" name="alumni_program" class="form-control"
                                        required>
                                        <option selected="">Choose...</option>
                                        <option value="1">D1</option>
                                        <option value="2">D4</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="name"><b>Lulusan</b></label>
                                    <select id="p_alumni_lulusan" name="alumni_program" class="form-control"
                                        required>
                                        <option selected="">Choose...</option>
                                        <option value="1">2019</option>
                                        <option value="2">2020</option>
                                        <option value="2">2021</option>
                                        <option value="2">2022</option>
                                        <option value="2">2023</option>
                                    </select>
                                </div>
                                <label for="name"><b>Kesesuaian Keterampilan Lulusan</b></label>
                                <p>Skor 1-5 (1 sangat rendah - 5 sangat tinggi)</p>
                            </div>

                            {{-- Integritas (etika & moral) --}}
                            <div class="row">
                                <label style="text-align: center" for="name"><b>Integritas (Etika & Moral)</b></label>
                                <input type="range" class="form-range" min="1" max="5" id="customRange2">
                            </div>

                            {{-- Keahlian pada Bidang Ilmu (kompetensi utama) --}}
                            <div class="row">
                                <label style="text-align: center" for="name"><b>Keahlian pada Bidang Ilmu (kompetensi utama)</b></label>
                                <input type="range" class="form-range" min="1" max="5" id="customRange2">
                            </div>

                            {{-- Kerjasama dalam tim --}}
                            <div class="row">
                                <label style="text-align: center" for="name"><b>Kerja sama dalam tim</b></label>
                                <input type="range" class="form-range" min="1" max="5" id="customRange2">
                            </div>

                            {{-- Kemampuan dalam berbahasa asing --}}
                            <div class="row">
                                <label style="text-align: center" for="name"><b>Kemampuan dalam berbahasa asing</b></label>
                                <input type="range" class="form-range" min="1" max="5" id="customRange2">
                            </div>

                            {{-- Kemampuan komunikasi --}}
                            <div class="row">
                                <label style="text-align: center" for="name"><b>Kemampuan Komunikasi</b></label>
                                <input type="range" class="form-range" min="1" max="5" id="customRange2">
                            </div>

                            {{-- Penggunaan Teknologi Informasi --}}
                            <div class="row">
                                <label style="text-align: center" for="name"><b>Penggunaan Teknologi Informasi</b></label>
                                <input type="range" class="form-range" min="1" max="5" id="customRange2">
                            </div>

                            {{-- Pengembangan Diri --}}
                            <div class="row">
                                <label style="text-align: center" for="name"><b>Pengembangan Diri</b></label>
                                <input type="range" class="form-range" min="1" max="5" id="customRange2">
                            </div>

                            {{-- Keluasan Wawasan antar disiplin ilmu --}}
                            <div class="row">
                                <label style="text-align: center" for="name"><b>Keluasan Wawasan antar disiplin ilmu</b></label>
                                <input type="range" class="form-range" min="1" max="5" id="customRange2">
                            </div>

                            {{-- Kepemimpinan --}}
                            <div class="row">
                                <label style="text-align: center" for="name"><b>Kepemimpinan</b></label>
                                <input type="range" class="form-range" min="1" max="5" id="customRange2">
                            </div>

                            <br>
                            <div class="form-group">
                                <label for="name"><b>Harapan/saran dalam rangka peningkatan kualitas lulusan
                                        JTIK</b></label>
                                <textarea class="form-control" name="message" rows="10" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>SITS-JTIK</h3>
                        <p>
                            Jl. Prof. DR. G.A. Siwabessy<br>
                            Kampus Universitas Indonesia<br>
                            Depok 16425<br><br>
                            <strong>Phone:</strong> 021-7270036 ext 279<br>
                            <strong>Email:</strong> tik@pnj.ac.id<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                        <div class="social-links mt-3">
                            <a href="https://www.instagram.com/jtik_pnj/?hl=en" class="instagram"><i
                                    class="bx bxl-instagram"></i></a>
                            <a href="https://www.youtube.com/@TIKPNJ" class="youtube"><i
                                    class="bx bxl-youtube"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>Tracer Study Teknik Informatika dan Komputer Politeknik Negeri
                        Jakarta</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://tik.pnj.ac.id/">TIK PNJ</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landingpage/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landingpage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landingpage/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landingpage/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landingpage/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('landingpage/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('landingpage/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('landingpage/assets/js/main.js') }}"></script>

</body>

</html>

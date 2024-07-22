<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>About Gotto Job Portal</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link href="/css/bootstrap.min.css" rel="stylesheet">

        <link href="/css/bootstrap-icons.css" rel="stylesheet">

        <link href="/css/owl.carousel.min.css" rel="stylesheet">

        <link href="/css/owl.theme.default.min.css" rel="stylesheet">

        <link href="/css/tooplate-gotto-job.css" rel="stylesheet">
        

</head>
    
<body id="top">

    <nav class="navbar navbar-expand-lg " style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" >
                <img src="/img/logo-bc.png" class="img-fluid logo-image">

                <div class="d-flex flex-column">
                    <strong class="logo-text">BENIH</strong>
                    <small class="logo-slogan">Cemerlang</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-center ms-lg-5">
                        <li class="nav-item">
                            <a class="nav-link active" href="index">Homepage</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="mitrasekolah" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mitra Sekolah</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="mitrasekolah">Mitra Sekolah</a></li>

                                <li><a class="dropdown-item" href="daftarmitrasekolah">Pendaftaran Mitra Sekolah</a></li>
                                <?php if (in_groups('sekolah')) : ?>
                                <li><a class="dropdown-item" href="dashboard_mitrasekolah">Dashboard</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Guru Pengganti</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="gurupengganti">Program Guru Pengganti</a></li>

                                <li><a class="dropdown-item" href="daftarguru">Pendaftaran Guru Pengganti</a></li>
                                <?php if (in_groups('guru')) : ?>
                                <li><a class="dropdown-item" href="/dashboard_gurupengganti">Dashboard</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>

                        <li class="nav-item">
                        <?php if (in_groups('guru','sekolah')) : ?>
                        <a class="nav-link" href="penjadwalan">Penjadwalan</a>
                        <?php endif; ?>
                    </li>

                    <?php if (logged_in()): ?>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">       
                                <?= user()->username ?>
                                    </span>
                                <img class="img-profile rounded-circle"
                                    src="/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdownuser dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="nav-link " href="<?= site_url('logout') ?>">Logout</a>
                            </div>
                        </li>
                    <?php else: ?>
                        <li class="nav-item ms-lg-auto">
                            <a class="nav-link" href="<?= site_url('register') ?>">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-btn btn" href="<?= site_url('login') ?>">Login</a>
                        </li>
                    <?php endif; ?>  
                </ul>
            </div>
        </div>
    </nav>

<main>

        


        <section class="categories-section section-padding" id="categories-section">
            <div class="container">
                <div class="row justify-content-center align-items-center">

                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-5">Kumpulan Mitra Sekolah Dasar</h2>
                    </div>

                      <div class="card-group">
                        <div class="card">
                          <img src="/img/mitrasekolah/1tegal.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">SDN 1 Tegalmengkeb</h5>
                            <p class="card-text">SD Negeri 1 Tegal Mengkeb adalah sebuah lembaga sekolah SD negeri yang beralamat di Tegal Mengkeb, Kab. Tabanan. SD negeri ini didirikan pertama kali pada tahun 1953. Sekarang SD Negeri 1 Tegal Mengkeb mengimplementasikan panduan kurikulum belajar SD 2013. SD Negeri 1 Tegal Mengkeb ditangani oleh seorang operator yang bernama Ni Gusti Ayu Lusi Setiyawati.</p>
                          </div>
                        </div>
                        <div class="card">
                          <img src="/img/mitrasekolah/2krobokankaja.jpeg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">SD No. 2 Krobokan Kaja</h5>
                            <p class="card-text">SD No. 2 Kerobokan Kaja adalah sebuah lembaga sekolah SD negeri yang alamatnya di Br. Muding Kelod, Kab. Badung. SD negeri ini didirikan pertama kali pada tahun 1983. Pada saat ini SD No. 2 Kerobokan Kaja memakai panduan kurikulum belajar pemerintah yaitu SD 2013. SD No. 2 Kerobokan Kaja memiliki kepala sekolah dengan nama Ni Wayan Candra Asmini dan operator sekolah Rai Dewi Puspitasari.</p>
                          </div>
                        </div>
                        <div class="card">
                          <img src="/img/mitrasekolah/2tibubeneng.jpeg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">SD No. 2 Tibubeneng</h5>
                            <p class="card-text">SD No. 2 Tibubeneng adalah sebuah sekolah SD negeri yang yang lokasinya berada di Jl Pantai Berawa, Kab. Badung. SD negeri ini memulai kegiatan pendidikan belajar mengajarnya pada tahun 1978. Sekarang SD No. 2 Tibubeneng menggunakan kurikulum belajar SD 2013. SD No. 2 Tibubeneng memiliki kepala sekolah dengan nama Ni Nengah Sukerti ditangani oleh seorang operator yang bernama Nadya Regina Octivani.</p>
                          </div>
                        </div>
                      </div>

                      <div class="card-group">
                        <div class="card">
                          <img src="/img/mitrasekolah/3krobokankaja.JPG" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">SD No. 3 Krobokan Kaja</h5>
                            <p class="card-text">SD No. 3 Kerobokan Kaja adalah sebuah lembaga sekolah SD negeri yang alamatnya di Lingkungan Beluran, Kab. Badung. SD negeri ini memulai kegiatan pendidikan belajar mengajarnya pada tahun 1983. Pada waktu ini SD No. 3 Kerobokan Kaja memakai panduan kurikulum belajar pemerintah yaitu SD 2013. SD No. 3 Kerobokan Kaja memiliki sosok kepala sekolah yang bernama Ni Ketut Susani dan operator sekolah Ni Putu Maya Ekarini.</p>
                          </div>
                        </div>
                        <div class="card">
                          <img src="/img/mitrasekolah/3abianbase.jpeg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">SD No. 3 Abianbase</h5>
                            <p class="card-text">SD No. 3 Abianbase adalah sebuah institusi pendidikan SD negeri yang yang lokasinya berada di Lingk/banjar Cica, Abianbase, Kab. Badung. SD negeri ini berdiri sejak 1978. Sekarang SD No. 3 Abianbase menggunakan kurikulum belajar SD 2013. SD No. 3 Abianbase dipimpin oleh seorang kepala sekolah yang bernama Ni Nyoman Suciasih Darmayati,s.pd,mm.pd dan operator sekolah Ni Kadek Rai Yuni Arnawati.</p>

                          </div>
                        </div>
                        <div class="card">
                          <img src="/img/mitrasekolah/fajarharapan.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">SD fajar Harapan</h5>
                            <p class="card-text">SD Fajar Harapan adalah sebuah institusi pendidikan SD swasta yang yang lokasinya berada di Jl Raya Padonan, Kab. Badung. SD swasta ini didirikan pertama kali pada tahun 2003. Sekarang SD Fajar Harapan menggunakan kurikulum belajar SD 2013. SD Fajar Harapan dikepalai oleh seorang kepala sekolah bernama Ni Made Sriani ditangani oleh seorang operator yang bernama I Komang Tri Tunggal Ada, S.pd.h.</p>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-5"><br>Kumpulan Mitra Sekolah Menengah Pertama</h2>
                    </div>

                        <div class="card" style="width: 23rem;">
                          <img src="/img/mitrasekolah/ngurahrai.jpeg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">SMP Ngurah Rai Krobokan</h5>
                            <p class="card-text">SMP Ngurah Rai Krobokan adalah sebuah institusi pendidikan SMP swasta yang yang lokasinya berada di Jln. Raya Kerobokan, Kerobokan, Kec. Kuta Utara, Kab. Badung. SD swasta ini didirikan pertama kali pada tahun 1980 Sekarang SMP Ngurah Rai Krobokan menggunakan kurikulum belajar SMP 2013. SMP Ngurah Rai Krobokan dikepalai oleh seorang kepala sekolah bernama I Nyoman Sutomo ditangani oleh seorang operator yang bernama Ni Putu Dian Lisna Devi.</p>
                          </div>
                        </div>
                        
                      
                    
        </section>

        

    <footer class="site-footer">

        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-12 d-flex align-items-center">
                        <p class="copyright-text">Copyright © Benih Cemerlang</p>

                        
                    </div>

                    <div class="col-lg-5 container align-items-center ">
                            <ul class="social-icon ">
                                <li class="social-icon-item">
                                <a href="#" class="social-icon-link" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                </li>

                                <li class="social-icon-item">
                                <a href="https://www.facebook.com/benih.cemerlang" class="social-icon-link" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>

                                <li class="social-icon-item">
                                <a href="https://www.instagram.com/benihcemerlang/" class="social-icon-link" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>

                                <li class="social-icon-item">
                                <a href="#" class="social-icon-link" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    
                </div>
            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>

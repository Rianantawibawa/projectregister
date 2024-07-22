<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Benih Cemerlang</title>

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

        <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
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

                                <?php if (has_permission('daftar-mitrasekolah')) : ?>
                                <li><a class="dropdown-item" href="daftarmitrasekolah">Pendaftaran Mitra Sekolah</a></li>
                                <?php endif; ?>

                                <?php if (has_permission('dashboard-mitrasekolah')) : ?>
                                <li><a class="dropdown-item" href="dashboard_mitrasekolah">Dashboard</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Guru Pengganti</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="gurupengganti">Program Guru Pengganti</a></li>
                                
                                <?php if (has_permission('daftar-guru')) : ?>
                                <li><a class="dropdown-item" href="daftarguru">Pendaftaran Guru Pengganti</a></li>
                                <?php endif; ?>

                                <?php if (has_permission('dashboard-guru')) : ?>
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

            <section class="hero-section d-flex justify-content-center align-items-center">
                <div class="section-overlay"></div>

                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                            <div class="hero-section-text mt-5">
                                

                                <h1 class="hero-title text-white mt-4 mb-4">BENIH <br> CEMERLANG</h1>

                                
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            <section class="categories-section section-padding" id="categories-section">
                <div class="container">
                    <div class="row justify-content-center align-items-center">

                        <div class="col-lg-12 col-12 text-center">
                            <h2 class="mb-5">BENIH <span>CEMERLANG </span></h2>
                        </div>

                        <div class="col-lg-12 col-12 text-center text-justify ">
                            <h4 class="mb-5">Benih Cemerlang merupakan platfrom yang menyediakan semua informasi
                                tentang dunia Pendidikan. Didalam platfrom Benih Cemerlang terdapat forum
                                komunitas yang menjadi wadah untuk orang bisa mendapatkan informasi dan
                                membagikan informasi tentang dunia Pendidikan. Benih Cemerlang yang berlokasi
                                di Jln Tanah Sampi No 5 Banjar Beluran, Kerobokan Kaja, Kuta Utara yang
                                sekaligus tempat bimbingan belajar Benih Cemerlang. Benih Cemerlang itu sendiri
                                didirikan oleh Ibu Ni Ketut Susani, S.Pd, M.Pd pada tanggal 11 Juli 2020. </h4>
                        </div>

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.5725685499187!2d115.16634287208056!3d-8.636966791409531!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd239d2ad0a570b%3A0x1a580cd8c888536e!2sBenih%20Cemerlang!5e0!3m2!1sid!2sid!4v1714132873122!5m2!1sid!2sid" 
                        width="900" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                          
                        
            </section>

            <section>
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12">
                            <div class="custom-text-block custom-border-radius-start">
                                <h2 class="text-white mb-3 text-center">Visi</h2>

                                <p class="text-white text-center">Adanya alternatif dan penunjang pendidikan yang terjangkau bagi banyak orang untuk menciptakan sumber daya manusia yang lebih baik</p>
                                <p class="text-white text-center">Adanya peningkatan kesejahteraan bagi para pengajar lewat penyediaan platform yang memungkinkan mereka memberikan layanan pengajar yang baik kepada anak didik</p>

                                
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="custom-text-block custom-border-radius-end">
                                <h2 class="text-white mb-3 text-center">Misi</h2>

                                <p class="text-white text-center">Kami ingin memberdayakan para guru untuk dapat memberikan pengalaman dan pendidikan tambahan kepada para murid dengan cara yang lebih efektif dan efisien</p>
                                <p class="text-white text-center">Kami ingin setiap siswa bisa mendapatkan sumber pembelajaran dan bantuan pendalaman materi lewat bimbingan belajar di luar proses belajar formal di sekolah sekolah</p>

                            </div>
                        </div>

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
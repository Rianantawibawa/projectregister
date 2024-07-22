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
                <a class="navbar-brand d-flex align-items-center" href="index.html">
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
            <div class= "container">
            <h1> Detail Pendaftaran Guru Pengganti</h1>
      <a href="/dashboard_gurupengganti" class="btn btn-danger">Kembali</a> 
      <a href="/edit_gurupengganti/<?= $daftarguru->id ?>" class="btn btn-info">Edit</a>
      <table class="table">
        <thead>
          <tr>
            <td class="col-3 offset-2">Nama :</td>   
            <td scope="col"><?= $daftarguru ->namaguru ?></td>   
          </tr>
          <tr>
            <td scope="col">Alamat :</td>   
            <td scope="col"><?= $daftarguru ->alamatguru ?></td>   
          </tr>
          <tr>
            <td scope="col">Tempat Tanggal Lahir :</td>   
            <td scope="col"><?= $daftarguru ->ttl ?></td>   
          </tr>
          <tr>
            <td scope="col">No Hp :</td>   
            <td scope="col"><?= $daftarguru ->hp ?></td>   
          </tr>
          <tr>
            <td scope="col">Pendidikan Terakhir :</td>   
            <td scope="col"><?= $daftarguru ->pendidikan ?></td>   
          </tr>
          <tr>
            <td scope="col">Scan Ijazah :</td>   
            <td scope="col"><a href="<?php echo base_url('admin/download_pdf/' . $daftarguru->id . '/ijazah'); ?>" class="btn btn-outline-secondary btn-sm">Download Ijazah</a></td>   
          </tr>
          <tr>
            <td scope="col">Scan Ktp :</td>   
            <td scope="col"><a href="<?php echo base_url('admin/download_pdf/' . $daftarguru->id . '/ktp'); ?>" class="btn btn-outline-secondary btn-sm">Download Ktp</a></td>   
          </tr>
          <tr>
            <td scope="col">Scan Cv :</td>   
            <td scope="col"><a href="<?php echo base_url('admin/download_pdf/' . $daftarguru->id . '/cv'); ?>" class="btn btn-outline-secondary btn-sm">Download Cv</a></td>   
          </tr>
        </thead>
      </table>
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
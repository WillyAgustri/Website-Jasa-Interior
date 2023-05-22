<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>





    <!-- ----------------- -->
    <!-- Boostrap -->
    <!-- ----------------- -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">



    <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Resource/css/landing_page.css" />

    <!-- ---------------- -->
    <!-- script javascript -->
    <!-- ---------------- -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="Resource/js/landing_page.js"></script>


</head>

<body>
    <!-- ------------------------- -->
    <!--            Navbar        -->
    <!-- ------------------------- -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0 py-3">
        <div class="container-xl">
            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <p font-size="30">P A L A N G K A - I NT E R I O R</p>
            </a>
            <!-- Navbar toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <!-- Nav -->
                <div class="navbar-nav mx-lg-auto">
                    <a class="nav-item nav-link active" href="#" aria-current="page">Home</a>
                    <a class="nav-item nav-link" href="product.php">Produk</a>
                    <?php
                    include 'includes/koneksi.php';
                    session_start();

                    if (!isset($_SESSION['user_id'])) {
                    } else {
                        echo '
                    <a class="nav-item nav-link" href="dashboard.php">Dashboard</a>
                    ';
                    }



                    ?>

                </div>
                <!-- Right navigation -->
                <!-- Action -->
                <?php
                if (!isset($_SESSION['user_id'])) {

                    echo '
                    <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
                    <a href="login.html" class="btn btn-sm btn-primary w-full w-lg-auto">
                        Log-in
                    </a>
                </div>
                    ';
                } else {
                    echo '<div class="d-flex align-items-lg-center mt-3 mt-lg-0">
                    <form action="Resource/script/logout.php" method="POST">
                        <button type="submit">Log Out</button>
                    </form>


                </div>';
                } ?>


            </div>
        </div>
    </nav>



    <!-- ------------------------- -->
    <!--   Click Thought           -->
    <!-- ------------------------- -->

    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="mask flex-center">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-7 col-12 order-md-1 order-2">
                                <h4>Bangun Interior Impianmu!</h4>
                                <p>Jangan biarkan ruangan impianmu hanya menjadi mimpi belaka. Dengan Bangun Interior,
                                    impianmu bisa menjadi kenyataan. Hubungi kami sekarang untuk konsultasi gratis dan
                                    mulailah merancang ruangan impianmu!</p>
                                <a href="product.php">Lihat Selengkapnya!
                                </a>
                            </div>
                            <div class="col-md-5 col-12 order-md-2 order-1">
                                <img src="https://i.ibb.co/WkxxfgZ/pngegg-1.png" class="mx-auto" alt="slide"
                                    onerror="this.onerror=null;this.src='https://via.placeholder.com/150'; this.alt='Gambar tidak tersedia karena masalah koneksi internet';">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="mask flex-center">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-7 col-12 order-md-1 order-2">
                                <h4>Ciptakan Ruangan Impianmu
                                </h4>
                                <p>
                                    Apakah kamu bingung merancang dan mendesain ruangan impianmu? Palangka Interior siap
                                    membantu menciptakan ruangan impianmu dengan layanan desain interior yang
                                    profesional dan terpercaya.
                                </p>
                                <a href="#">Lihat Selengkapnya</a>
                            </div>
                            <div class="col-md-5 col-12 order-md-2 order-1"><img
                                    src="https://i.ibb.co/pjVTMs5/Minimalist-interior-yellow-living-room-3-D-render-on-transparent-background-PNG.png"
                                    class="mx-auto" alt="slide">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="mask flex-center">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-7 col-12 order-md-1 order-2">
                                <h4>
                                    Buat Rumahmu Lebih Hidup
                                </h4>
                                <p>
                                    Jangan biarkan rumahmu terasa membosankan. Dengan Palangka Interior, rumahmu akan
                                    menjadi
                                    tempat yang nyaman, indah, dan penuh kehidupan. Hubungi kami sekarang untuk
                                    konsultasi gratis dan mulailah menghidupkan kembali rumahmu!
                                </p>
                                <a href="#">Lihat Selengkapnya!
                                </a>
                            </div>
                            <div class="col-md-5 col-12 order-md-2 order-1"><img
                                    src="https://i.ibb.co/fkG7pzp/pngegg-2.png" class="mx-auto" alt="slide"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <span
                class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <span
                class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
    </div>
    <!--slide end-->

    <!-- --------------- -->
    <!-- Opening Product -->
    <!-- --------------- -->

    <?php
    include './Resource/script/home_product.php';
    ?>

    <div class="opening-product">
        <h3 class="h3">Upgrade Interior Untuk Kebiasaan Barumu</h3>
        <h4 class="subtitle-card">Proyek Terkait :</h4>
        <div class="row">
            <?php
            function rupiah($temp_total_price)
            {

                $total_price = "Rp " . number_format($temp_total_price, 2, ',', '.');
                return $total_price;
            }



            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                $nama_karyawan = $row['nama'];
                $nama_proyek = $row['nama_proyek'];
                // $deskripsi_proyek = $row['deskripsi_proyek'];
                $gambar1 = $row['gambar1'];
                $gambar2 = $row['gambar2'];
                $discount = $row['diskon'];
                $price = $row['harga_awal'];
                $total_price = $row['total_harga'];

                // Untuk Format Rupiah
            

                ?>

            <div class="col-md-3 col-sm-6">
                <div class="product-grid4">
                    <div class="product-image4">
                        <a href="#">
                            <img class="pic-1" src="data:image/jpeg;base64,<?php echo base64_encode($gambar1); ?>" />

                            <img class=" pic-2"
                                src="data:image/jpeg;base64,<?php echo base64_encode($gambar2); ?>" /></a>
                        <span class=" product-new-label">New</span>
                        <?php if ($discount > 0) { ?>
                        <span class="product-discount-label">
                            <?php echo $discount ?>%
                        </span>
                        <?php
                            }
                            ?>

                    </div>
                    <div class="product-content">
                        <div style="font-size : 12px">
                            Designer :
                            <?php echo $nama_karyawan; ?>
                        </div>
                        <h3 class=" title"><a href="#">
                                <?php echo $nama_proyek; ?>
                            </a></h3>
                        <div class="price">
                            <?php echo rupiah($total_price) ?>

                            <?php if ($discount > 0) { ?>
                            <span>
                                <?php echo rupiah($price); ?>
                            </span>
                            <?php
                                }
                                ?>
                        </div>

                        <?php
                            $pesan = "Hi, saya tertarik dengan proyek berikut:%0A%0AJudul Proyek: " . $nama_proyek .
                                "%0AHarga Proyek: " . rupiah($total_price) . "%0A" . $permintaan_tertarik;
                            ?>

                        <a class="add-to-cart" href="<?php echo $link_wa . $pesan; ?>">KONSULTASI</a>
                    </div>
                </div>
            </div>

            <?php
            }
            ?>
            <button type=" button" class="look_more">
                <a href="product.php">
                    Lihat Selengkapnya
                </a></button>
        </div>
    </div>


    <!-- ================================================================= -->
    <!-- ======================About Company====================== -->
    <!-- ================================================================= -->
    <section class="about" id="about">
        <div class="container">
            <div class="heading text-center">
                <h2>Tentang
                    <span>Perusahaan</span>
                </h2>
                <p>
                    Kami adalah sebuah perusahaan yang menyediakan jasa desain interior untuk berbagai jenis
                    ruangan,
                    seperti rumah, apartemen, kantor, toko, dan lain-lain. Kami memiliki pengalaman
                    bertahun-tahun dalam
                    industri ini dan telah mengerjakan proyek-proyek desain interior yang sukses untuk klien
                    kami.
                </p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <img src="https://i.ibb.co/qpz1hvM/About-us.jpg" alt="about" class="img-fluid" width="100%">
                </div>
                <div class="col-lg-6">
                    <h3>Kenapa Harus Memilih Konsultasi Bersama Kami? </h3>
                    <p>
                        Kami memiliki jaringan yang luas dengan pemasok dan kontraktor, yang memungkinkan
                        kami
                        untuk memberikan solusi desain yang terjangkau dan berkualitas tinggi untuk klien
                        kami.
                        Kami
                        selalu berusaha untuk memberikan pelayanan yang ramah dan profesional, serta
                        menyelesaikan
                        proyek-proyek kami dengan tepat waktu dan sesuai dengan anggaran yang disepakati.
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>
                                <i class="far fa-star"></i>Awesome Design
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <h4>
                                <i class="far fa-star"></i>
                                Creative Design
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <h4>
                                <i class="far fa-star"></i>Better Client Service
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <h4>
                                <i class="far fa-star"></i>
                                Digital Marketing & Branding
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <h4>
                                <i class="far fa-star"></i>Creative Design
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <h4>
                                <i class="far fa-star"></i>
                                Speed And Flexibility
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ------------------------ -->
    <!-- Our Team -->
    <!-- ------------------------ -->

    <?php
    include './Resource/script/our_team.php';


    ?>

    <section class="our-webcoderskull padding-lg">
        <div class="container">
            <div class="row heading heading-icon">
                <h2>Our Team</h2>
            </div>
            <ul class="row">
                <?php
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $nama = $row['nama'];
                    $role = $row['user_role'];
                    $img_profile = $row['img_profile'];

                    ?>
                <li class="col-12 col-md-6 col-lg-3">
                    <div class="cnt-block equal-hight" style="height: 349px;">
                        <figure><img src="data:image/jpeg;base64, <?php echo base64_encode($img_profile) ?>"
                                class=" img-responsive" alt="">
                        </figure>
                        <h3><a href="http://www.webcoderskull.com/">
                                <?php echo $nama ?>
                            </a></h3>
                        <p>
                            <?php echo $role ?>
                        </p>
                        <ul class=" follow-us clearfix">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </li>
                <?php

                }
                ?>

            </ul>
        </div>
    </section>

</body>
<footer class="bg-footer">
    <div class="footer-container">
        <div>
            <h6 class="footer-heading text-uppercase text-white">Informations</h6>
            <ul class="footer-link mt-4">
                <li><a href="#">Home</a></li>
                <li><a href="product.php">Product</a></li>
                <li><a href="#!"></a></li>
            </ul>
        </div>
        <div>
            <h6 class="footer-heading text-uppercase text-white">Help</h6>
            <ul class="footer-link mt-4">
                <li><a href="#!">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="footer-link">
            <h6 class="footer-heading text-uppercase text-white">Contact us</h6>
            <p class="contact-info mt-4">Butuh Bantuan?</p>
            <p class="contact-info">+62-896-912-1215</p>
            <p class="contact-info">willyofficial082@gmail.com</p>

        </div>
    </div>
    <div class="text-center mt-5">
        <p class="footer-alt">2022 © Society, All Rights Reserved</p>
    </div>
</footer>

</html>
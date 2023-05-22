<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>



    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="./Resource/css/product.css" />
</head>
<body>
    <!-- --------------------------------------------------- -->
    <!-- Navbar -->
    <!-- --------------------------------------------------- -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0 py-3">
        <div class="container-xl" id="container-xl">
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
                    <a class="nav-item nav-link active" href="./landing-page.php" aria-current="page">Home</a>
                    <a class="nav-item nav-link" href="product.php">Produk</a>
                    <?php
                    include 'includes/koneksi.php';
                    session_start();

                    if (!isset($_SESSION['user_id'])) {

                    } else {
                        echo '<a class="nav-item nav-link" href="dashboard.php">Dashboard</a>';

                    }
                    ?>
                </div>
                <!-- Right navigation -->
                <!-- Action -->
                <?php
                include 'includes/koneksi.php';
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
                    <a class="btn btn-sm btn-secondary w-full w-lg-auto" href="Resource/script/logout.php">
                        Log Out
                    </a>


                </div>';

                } ?>
            </div>
        </div>
    </nav>


    <!-- ======================================= -->
    <!-- Product -->
    <!-- ======================================= -->

    <?php
    include './Resource/script/product.php';
    ?>

    <div class="opening-product">
        <h3 class="h3"></h3>
        <h4 class="subtitle-card"></h4>
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
                        <h3 class="title"><a href="#">
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
                        <a class="add-to-cart" href="<?php echo $link_wa . $pesan ?> ">KONSULTASI</a>
                    </div>
                </div>
            </div>

            <?php
            }
            ?>
        </div>
    </div>


</body>

<!-- ===================== -->
<!--  footer -->
<!-- ===================== -->

<footer class=" bg-footer">
    <div class="footer-container">
        <div>
            <h6 class="footer-heading text-uppercase text-white">Informations</h6>
            <ul class="footer-link mt-4">
                <li><a href="#">Home</a></li>
                <li><a href="product.php">Product</a></li>
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
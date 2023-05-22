<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
</head>
<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
    <link rel="stylesheet" href="Resource/css/dashboard.css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!------ Include the above in your HEAD tag ---------->

    <body>
        <header>
            <!-- -------------------  -->
            <!-- Navbar dashboard -->
            <!-- -------------------  -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0 py-3">
                <div class="container-xl">
                    <!-- Logo -->
                    <a class="navbar-brand" href="#">
                        P A L A N G K A - I N T E R I O R

                    </a>
                    <!-- Navbar toggle -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Collapse -->
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <!-- Nav -->
                        <div class="navbar-nav mx-lg-auto">
                            <a class="nav-item nav-link active" href="landing-page.php" aria-current="page">Home</a>
                            <a class="nav-item nav-link" href="product.php">Product</a>

                            <!-- Mengecek apakah admin sudah login pada login.html if not maka balik ke login.html -->

                            <?php
                            include 'includes/koneksi.php';
                            session_start();

                            if (!isset($_SESSION['user_id'])) {
                                echo "<script>alert('Anda Perlu Login Terlebih Dahulu');</script>";
                                header("Location: ../../login.html");

                            } else {
                                echo '<a class="nav-item nav-link" href="dashboard.php">Dashboard</a>';

                            }


                            ?>



                        </div>
                        <!-- Right navigation -->
                        <!-- Action -->
                        <div class="d-flex align-items-lg-center mt-3 mt-lg-0">
                            <form action="Resource/script/logout.php" method="POST">
                                <button type="submit">Log Out</button>
                            </form>


                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Data Analist -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">

                    <!-- Icon Cards-->
                    <?php
                    include "./Resource/script/info_dashboard.php";
                    ?>


                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
                        <div class="inforide">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">

                                </div>
                                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                                    <h4>Karyawan</h4>
                                    <h2>
                                        <?php echo $jumlah_karyawan ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
                        <div class="inforide">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridetwo">

                                </div>
                                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                                    <h4>Proyek</h4>
                                    <h2>
                                        <?php echo $jumlah_proyek ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
                        <div class="inforide">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridethree">

                                </div>
                                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                                    <h4>Admin</h4>
                                    <h2>
                                        <?php echo $jumlah_admin ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>





        <!-- ------------------------- -->
        <!-- Title and Sub-title -->
        <!-- ------------------------- -->

        <main>
            <div class="container my-5">


                <?php
                include 'Resource/script/data_dashboard.php'
                    ?>
                <div class="card">
                    <table class="table table-hover">




                        <thead>
                            <tr>

                                <th scope="col">ID PROYEK</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama Project</th>
                                <th scope="col">Harga Awal</th>
                                <th scope="col">Diskon</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                       
                            $halaman = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
                            $halaman_awal = ($halaman > 1) ? ($halaman * 5) - 5 : 0;

                            $sebelum = $halaman - 1;
                            $setelah = $halaman + 1;

                            // Query jumlah data menggunakan PDO
                            $jumlah_data = $db->query("SELECT COUNT(id_proyek) AS jumlah_data FROM proyek")->fetch(PDO::FETCH_ASSOC)['jumlah_data'];

                            $total_halaman = ceil($jumlah_data / 5);
                            $query = "SELECT * FROM proyek LIMIT :halaman_awal, 5";
                            $stmt = $db->prepare($query);
                            $stmt->bindValue(':halaman_awal', $halaman_awal, PDO::PARAM_INT);
                            $stmt->execute();
                            $nomor = $halaman_awal + 1;

                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $id_proyek = $row['id_proyek'];
                                $nama = $row['nama_proyek'];
                                $harga_awal = $row['harga_awal'];
                                $diskon = $row['diskon'];
                                $total = $row['total_harga'];
                                $gambar1 = $row['gambar1'];
                                $gambar2 = $row['gambar2'];

                                ?>

                            <tr>

                                <th scope="row">
                                    <?php
                                        echo $id_proyek
                                            ?>
                                </th>
                                <td>
                                    <img src="data:image/jpeg;base64,<?php echo base64_encode($gambar1) ?>" alt="">
                                    <img src=" data:image/jpeg;base64,<?php echo base64_encode($gambar2) ?>" alt="">
                                </td>
                                <td>
                                    <?php
                                        echo $nama
                                            ?>

                                </td>
                                <td>
                                    <?php
                                        echo rupiah($harga_awal)
                                            ?>
                                </td>
                                <td>
                                    <?php
                                        echo $diskon
                                            ?>%
                                </td>

                                <td>
                                    <?php
                                        echo rupiah($total)
                                            ?>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="CRUD/edit_data.php?id_proyek=<?= $id_proyek; ?>"><i
                                            class="far fa-edit"></i>Edit</a>
                                    <a href="CRUD/delete_data.php?id_proyek=<?= $id_proyek; ?>"
                                        class="btn btn-sm btn-danger" href="#"><i class="fas fa-trash-alt"></i>
                                        Delete</a>
                                </td>



                            </tr>



                            <?php
                            }
                            ?>
                            <tr>
                                <thread>

                                    <th scope="col">

                                    </th>
                                    <th scope="col"></th>
                                    <th scope="col">
                                        <nav>

                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link" <?php if ($halaman > 1) {
                                                        echo "href='?halaman=$sebelum'";
                                                    } ?>>Previous</a>
                                                </li>
                                                <?php
                                                for ($x = 1; $x <= $total_halaman; $x++) {
                                                    ?>
                                                <li class="page-item"><a class="page-link"
                                                        href="?halaman=<?php echo $x ?>">
                                                        <?php echo $x; ?></a></li>
                                                <?php
                                                }
                                                ?>
                                                <li class=" page-item">
                                                    <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                        echo "href='?halaman=$setelah'";
                                                    } ?>>Next</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </th>
                                    <th scope="col"></th>
                                    <th scope="col">

                                    <th scope="col">

                                        <a href="CRUD/tambah_data.php" class="btn btn-sm btn-primary float-end">Tambah
                                            Data</a>


                                    </th>


                                    </th>

                                </thread>
                            </tr>



                        </tbody>
                    </table>

                </div>
            </div>
        </main>
        <!---->

        <!---->
        <footer></footer>
    </body>
</body>
</html>
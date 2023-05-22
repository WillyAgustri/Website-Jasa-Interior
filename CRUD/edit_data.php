<!DOCTYPE html>
<html>

<head>
    <title>Ubah Data</title>
</head>
<link rel="stylesheet" type="text/css" href="../boostrap/css/bootstrap.min.css">

<body>


    <div class="card">
        <div class="card-header bg-success text-white ">
            Edit Data Pegawai
        </div>
        <div class="card-body">
            <?php
            include('../includes/koneksi.php');

            $id_proyek = $_GET['id_proyek']; //mengambil id_pelanggan yang ingin diubah
            
            //menampilkan data_pelanggan berdasarkan id_pelanggan
            $stmt = $db->prepare("SELECT u.nama,p.id_proyek,p.id_user, p.nama_proyek,p.harga_awal,p.diskon,p.total_harga,p.gambar1,p.gambar2 FROM USER AS u JOIN proyek AS p ON p.id_user = p.id_user WHERE p.id_proyek = :id_proyek");
            $stmt->bindParam(':id_proyek', $id_proyek);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $id_proyek = $row["id_proyek"];
            $nama_desainer = $row["nama"];
            $id_user = $row["id_user"];
            $nama_proyek = $row["nama_proyek"];
            $harga_awal = $row["harga_awal"];
            $diskon = $row["diskon"];
            $total_harga = $row["total_harga"];
            $gambar1 = $row["gambar1"];
            $gambar2 = $row["gambar2"];

            ?>
            <form action="" method="post" role="form">
                <div class="form-group">
                    <div class="form-group">
                        <label>ID Pelanggan :
                            <?php echo $id_proyek; ?>
                            <input type="hidden" name="id_proyek" class="form-control"
                                value="<?php echo $id_proyek; ?>">


                        </label>

                    </div>
                    <div class=" form-group">
                        <label>ID Desainer</label>
                        <input type="text" name="id_user" class="form-control" value="<?php echo $id_user; ?>"> <span>

                        </span>
                    </div>
                    <div class=" form-group">
                        <label>Nama Proyek</label>
                        <input type="text" name="nama_proyek" class="form-control" value="<?php echo $nama_proyek; ?>">
                    </div>

                    <div class=" form-group">
                        <label>harga_awal</label>
                        <input type="text" name="harga_awal" class="form-control" value="<?php echo $harga_awal; ?>">
                    </div>

                    <div class=" form-group">
                        <label>diskon</label>
                        <input type="text" name="diskon" class="form-control" value="<?php echo $diskon; ?>">
                    </div>
                    <div class=" form-group">
                        <label>total_harga</label>
                        <input type="text" name="total_harga" class="form-control" value="<?php echo $total_harga; ?>">
                    </div>
                    <!-- <div class=" form-group">
                        <label>Password Pelanggan</label>
                        <input type="text" name="password" class="form-control" value="<?php echo $gambar1; ?>">
                    </div>
                    <div class=" form-group">
                        <label>Password Pelanggan</label>
                        <input type="text" name="password" class="form-control" value="<?php echo $gambar2; ?>">
                    </div> -->
                    <button type=" submit" class="btn btn-success" name="submit" value="simpan"
                        style="margin-top: 20px;">Update Data</button>
                    <button type="button" class="btn btn-secondary" onclick="location.href='../dashboard.php'"
                        style="margin-top: 20px;">Batal</button>

            </form>




            <?php

            //jika klik tombol submit maka akan melakukan perubahan
            if (isset($_POST['submit'])) {
                $id_proyek = $_POST['id_proyek'];
                $id_user = $_POST['id_user'];
                $nama_proyek = $_POST['nama_proyek'];
                $harga_awal = $_POST['harga_awal'];
                $diskon = $_POST['diskon'];
                $total_harga = $_POST['total_harga'];
                //query mengubah tb_proyek
                $db->query("update proyek set id_user='$id_user', nama_proyek='$nama_proyek', harga_awal='$harga_awal', 
            		diskon='$diskon' where id_proyek ='$id_proyek'");

                if ($stmt->execute()) {
                    //ini untuk menampilkan alert berhasil dan redirect ke halaman index
                    echo "<script>window.location='../dashboard.php';</script>";
                } else {
                    echo "Error: " . $stmt->errorInfo();
                    echo "Error: " . $error[2];
                }
            }



            ?>

        </div>
    </div>




    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>
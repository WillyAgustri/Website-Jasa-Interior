<!DOCTYPE html>
<html>



<head>
    <title>Contoh Insert Gambar dengan PHP</title>
    <link rel="stylesheet" type="text/css" href="../boostrap/css/bootstrap.min.css">
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <!-- <div class="form-group">
            <label>ID Proyek</label>
            <input type="text" name="id_pegawai" required="" class="form-control">
        </div> -->
        <div class="form-group" style="margin-top:20px;">
            <label>ID Desainer</label>
            <input type="text" name="id_user" class="form-control">
        </div>
        <div class="form-group" style="margin-top:20px;">
            <label>Nama Proyek</label>
            <input type="text" name="nama_proyek" class="form-control">
        </div>

        <div class="form-group" style="margin-top:20px;">

            <label>Harga Awal</label>
            <input type="text" name="harga_awal" class="form-control">
        </div>

        <div class="form-group" style="margin-top:20px;">
            <label>Diskon</label>
            <input type="text" name="diskon" class="form-control">
        </div>

        <div class="form-group" style="margin-top:20px;">
            <label>Total Harga</label>
            <input type="text" name="total_harga" class="form-control">
        </div>

        <div class="form-group" style="margin-top:20px;">
            <label>Gambar 1 (Ukuran Gambar : 500 x 500 px)</label>
            <input type="file" name="gambar1" accept="image/*" class="form-control">
        </div>
        <div class="form-group" style="margin-top:20px;">
            <label>Gambar 2 (Ukuran Gambar : 500 x 500 px)</label>
            <input type="file" name="gambar2" accept="image/*" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary" name="submit" value="simpan" style="margin-top:10px;">Simpan
            data</button>
        <button type="button" class="btn btn-secondary" onclick="location.href='../dashboard.php'"
            style="margin-top: 10px;">Batal</button>




    </form>
</body>
</html>

<?php
include '../includes/koneksi.php';
if (isset($_POST['submit'])) {
    // Prepare the insert statement
    $stmt = $db->prepare("INSERT INTO  proyek(id_user,nama_proyek,harga_awal,diskon,total_harga,gambar1,gambar2) VALUES ( :id_user, :nama_proyek, :harga_awal, :diskon,:total_harga,:gambar1,:gambar2)");

    // Bind the parameters to the prepared statement
    $stmt->bindParam(':id_user', $id_user);
    $stmt->bindParam(':nama_proyek', $nama_proyek);
    $stmt->bindParam(':harga_awal', $harga_awal);
    $stmt->bindParam(':diskon', $diskon);
    $stmt->bindParam(':total_harga', $total_harga);
    $stmt->bindParam(':gambar1', $gambar1, PDO::PARAM_LOB);
    $stmt->bindParam(':gambar2', $gambar2, PDO::PARAM_LOB);

    // Assign values to the parameters
    $id_user = $_POST['id_user'];
    $nama_proyek = $_POST['nama_proyek'];
    $harga_awal = $_POST['harga_awal'];
    $diskon = $_POST['diskon'];
    $total_harga = $_POST['total_harga'];
    $gambar1 = $_FILES['gambar1']['name'];
    $gambar2 = $_FILES['gambar2']['name'];

    $gambar1Data = file_get_contents($_FILES['gambar1']['tmp_name']);
    $gambar2Data = file_get_contents($_FILES['gambar2']['tmp_name']);


    $gambar1 = $gambar1Data !== false ? $gambar1Data : null;
    $gambar2 = $gambar2Data !== false ? $gambar2Data : null;

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the dashboard page
        header("Location: ../dashboard.php");
        exit();
    } else {
        // Display an error message
        echo "Error: " . $stmt->errorInfo();
    }
}


?>
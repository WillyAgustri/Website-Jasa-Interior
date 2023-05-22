<?php
session_start();


// koneksi ke database
include '../../includes/koneksi.php';


// ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// cek apakah data form kosong
if (empty($username) || empty($password)) {
    $_SESSION['error'] = 'Username atau password kosong';
    echo "<script>alert('Username atau password kosong');</script>";
    echo "<script>window.location.replace('../../login.html');</script>";
    exit();

}

// query untuk mencari user di database
$query = "SELECT * FROM login WHERE username = :username AND password = :password";
$stmt = $db->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

// jika data pengguna ada
if ($user) {
    if ($user['user_role'] == 'Admin' || $user['user_role'] == 'Karyawan') {
        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['level'] = $user['user_role'];

        if (isset($_SESSION['user_id'])) {
            echo "<script>alert('Berhasil Login');</script>";

            header("Location: ../../dashboard.php");


        } else {
            // Jika user id belum disimpan di dalam session, redirect atau lakukan operasi lainnya
            echo "<script>alert('Gagal menyimpan user ID ke dalam session.');</script>";


        }



    }
} else {
    echo "<script>
alert('Username atau password Salah!');
</script>";
    echo "<script>
window.location.replace('../../login.html');
</script>";
}
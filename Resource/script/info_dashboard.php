<?php
include "../UTS/includes/koneksi.php";


$query = "SELECT u.nama,count(l.user_role) as jumlah_karyawan from user as u join login as l on l.id_user = u.id_user where user_role = 'Karyawan'";
$stmt = $db->query($query);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$jumlah_karyawan = $result['jumlah_karyawan'];


$query1 = "select count(id_proyek) as jumlah_proyek from proyek";
$stmt1 = $db->query($query1);
$result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
$jumlah_proyek = $result1['jumlah_proyek'];

$query2 = "select count(user_role) as jumlah_admin from login where user_role= 'Admin' ";
$stmt2 = $db->query($query2);
$result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
$jumlah_admin = $result2['jumlah_admin'];
?>
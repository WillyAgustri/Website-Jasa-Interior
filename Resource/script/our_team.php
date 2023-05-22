<?php
include 'includes/koneksi.php';


$query = 'SELECT u.nama,u.img_profile,l.user_role from user as u join login as l on u.id_user = l.id_user where user_role="karyawan" or user_role="Admin"';
$stmt = $db->query($query);


?>
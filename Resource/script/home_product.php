<?php

include 'includes/koneksi.php';

$query = "SELECT p.id_proyek, p.nama_proyek, p.harga_awal, p.diskon, p.total_harga, p.gambar1, p.gambar2, u.nama 
FROM user AS u 
JOIN proyek AS p ON u.id_user = p.id_user order by diskon desc limit 4";

$stmt = $db->query($query);


// mengambil data dari database
$permintaan_tertarik = "Apakah Anda masih menerima proyek ini?";



// menggabungkan teks pesan ke dalam link WhatsApp
$link_wa = "https://wa.me/089691212015?text=";

?>
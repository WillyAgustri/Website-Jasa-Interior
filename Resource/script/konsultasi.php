<?php

include '../../../includes/koneksi.php';
// mengambil data dari database
$permintaan_tertarik = "Apakah Anda masih menerima proyek ini?";


// menggabungkan teks pesan ke dalam link WhatsApp
$link_wa = "https://wa.me/6281234567890?text=" . $pesan;
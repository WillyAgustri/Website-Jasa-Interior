<?php
include '../includes/koneksi.php';

$id_proyek = $_GET['id_proyek'];

$query = "DELETE FROM proyek WHERE id_proyek = ?";
$stmt = $db->prepare($query);

$stmt->execute([$id_proyek]);

if ($stmt->rowCount() > 0) {
    echo "<script>
    alert('Proyek berhasil dihapus.');
    window.location='../dashboard.php';</script>";
} else {
    echo "<script>
    alert('Proyek gagal dihapus.');
    window.location='../dashboard.php';</script>";
}
?>
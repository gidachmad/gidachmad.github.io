<?php
include '../script/koneksi.php';
$idproduk = $_GET["idproduk"];

//jalankan query DELETE untuk menghapus data
$query = "DELETE FROM produk WHERE idproduk='$idproduk' ";
$hasil_query = mysqli_query($conn, $query);

//periksa query, apakah ada kesalahan
if (!$hasil_query) {
    die("Gagal menghapus data: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data berhasil dihapus.');window.location='produklist_admin.php';</script>";
}

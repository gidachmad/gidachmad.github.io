<?php
include 'script/koneksi.php';
$nama = $_POST['namareview'];
$deskripsi = $_POST['deskripsireview'];
$tgl = $_POST['tgl'];
$idbarang = $_POST['idbarang'];
$rating = $_POST['rating'];

$query = mysqli_query($conn, "INSERT INTO review_produk(namareview,deskripsireview,tgl,idbarang,rating) VALUES ('$nama','$deskripsi','$tgl','$idbarang','$rating')");


echo "<script>alert('Data berhasil ditambah.');window.location='produklist';</script>";

<?php
include '../script/koneksi.php';
$id = $_POST['idquote'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$query = mysqli_query($conn, "UPDATE quote SET judul='$judul',deskripsi='$deskripsi' WHERE idquote='$id'");
echo "<script>alert('Data berhasil diubah.');window.location='index_admin.php';</script>";

<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../script/koneksi.php';

// membuat variabel untuk menampung data dari form
$idproduk = $_POST['idproduk'];
$namaproduk   = $_POST['namaproduk'];
$komposisi     = $_POST['komposisi'];
$gambar = $_FILES['gambar']['name'];
$deskripsi    = $_POST['deskripsi'];
$harga    = $_POST['harga'];


//cek dulu jika ada gambar produk jalankan coding ini
if ($gambar != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak     = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $gambar; //menggabungkan angka acak dengan nama file sebenarnya
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, '../dist/img/gambar_produk/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
        // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
        $query = "UPDATE produk SET namaproduk='$namaproduk', komposisi='$komposisi',gambar='$nama_gambar_baru',deskripsi='$deskripsi',harga='$harga' WHERE idproduk='$idproduk'";
        $result = mysqli_query($conn, $query);
        // periska query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($conn) .
                " - " . mysqli_error($conn));
        } else {
            //tampil alert dan akan redirect ke halaman index.php
            echo "<script>alert('Data berhasil diubah.');window.location='produklist_admin.php';</script>";
        }
    } else {
        //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='produklist_admin.php';</script>";
    }
} else {
    $query = "UPDATE produk SET namaproduk='$namaproduk', komposisi='$komposisi',deskripsi='$deskripsi',harga='$harga' WHERE idproduk='$idproduk'";
    $result = mysqli_query($conn, $query);
    // periska query apakah ada error
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    } else {
        //tampil alert dan akan redirect ke halaman index.php

        echo "<script>alert('Data berhasil diubah.');window.location='produklist_admin.php';</script>";
    }
}

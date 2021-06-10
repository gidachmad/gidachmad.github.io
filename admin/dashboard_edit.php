<?php
require_once "../view/header_admin.php";
include '../script/koneksi.php';
session_start();
if (isset($_COOKIE["login"])) {
    if ($_COOKIE["login" == "true"]) {
        $_SESSION["login"] = true;
    }
}
if (!isset($_SESSION["login"])) {
    echo "<script>alert('Halaman tidak bisa diakses :)')
	document.location.href='index.php';
	</script>";
    die;
}
if (isset($_GET['idquote'])) {
    // ambil nilai idquote dari url dan disimpan dalam variabel $id
    $idquote = ($_GET["idquote"]);

    // menampilkan data dari database yang mempunyai idquote=$idquote
    $query = "SELECT * FROM quote ";
    $result = mysqli_query($conn, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if (!$result) {
        die("Query Error: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
    // apabila data tidak ada pada database maka akan dijalankan perintah ini
    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='tentang_admin.php';</script>";
    }
} else {
    // apabila tidak ada data GET idtentang pada akan di redirect
    echo "<script>alert('Masukkan data id.');window.location='tentang_admin.php';</script>";
}
?>

<div class="edit flex">
    <h1 class="title"> Edit Dashboard </h1>

    <div class="edit-container flex">
        <div class="img">
            <img src="../dist/img/coffee-1711431_1920.jpg" alt="">
        </div>

        <form action="proses_edit_dashboard.php" method="post" class="flex form" enctype="multipart/form-data">
            <!-- isi value ku nu geus aya dina database, meh mun teu jadi ngedit bisa langsung pencet konfirm atau update -->
            <input class="input" type="hidden" name="idquote" placeholder="Judul" value="<?php echo $data['idquote']; ?>" required>
            <input class="input" type="text" name="judul" placeholder="Judul" value="<?php echo $data['judul']; ?>" required>
            <textarea class="input" style="min-height:10rem; resize: none;" type="text" placeholder="Deskripsi" name="deskripsi" required> <?php echo $data['deskripsi']; ?></textarea>
            <input type="submit" value="Update" class="link">
        </form>
    </div>
</div>

<?php
require_once "../view/footer_admin.php";
?>
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
if (isset($_GET['idtentang'])) {
  // ambil nilai idtentang dari url dan disimpan dalam variabel $id
  $idtentang = ($_GET["idtentang"]);

  // menampilkan data dari database yang mempunyai idtentang=$idtentang
  $query = "SELECT idtentang,judul,deskripsi,gambar FROM tentang ";
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
  <h1 class="title"> Edit Tentang </h1>

  <div class="edit-container flex">
    <div class="img">
      <img src="../dist/img/<?php echo $data['gambar']; ?>" alt="">
    </div>

    <form action="proses_edit_tentang.php" method="post" class="flex form" enctype="multipart/form-data">
      <!-- isi value ku nu geus aya dina database, meh mun teu jadi ngedit bisa langsung pencet konfirm atau update -->
      <input class="input" type="hidden" name="idtentang" placeholder="Judul" value="<?php echo $data['idtentang']; ?>" required>
      <input class="input" type="text" name="judul" placeholder="Judul" value="<?php echo $data['judul']; ?>" required>
      <textarea class="input" style="min-height:10rem; resize: none;" type="text" placeholder="Deskripsi" name="deskripsi" required> <?php echo $data['deskripsi']; ?></textarea>
      <div class="input">
        <label for="img">Select image:</label>
        <input type="file" id="img" name="gambar" accept="image/*">
        <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar</i>
      </div>
      <input type="submit" value="Update" class="link">
    </form>
  </div>
</div>

<?php
require_once "../view/footer_admin.php";
?>
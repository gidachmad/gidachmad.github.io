<?php
require_once "../view/header_admin.php";
include '../script/koneksi.php';
if (isset($_GET['idproduk'])) {
  // ambil nilai idproduk dari url dan disimpan dalam variabel $id
  $idproduk = ($_GET["idproduk"]);

  // menampilkan data dari database yang mempunyai idproduk=$id
  $query = "SELECT * FROM produk WHERE idproduk='$idproduk'";
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
    echo "<script>alert('Data tidak ditemukan pada database');window.location='produklist_admin.php';</script>";
  }
} else {
  // apabila tidak ada data GET idproduk pada akan di redirect
  echo "<script>alert('Masukkan data id.');window.location='produklist_admin.php';</script>";
}
?>

<div class="edit flex">
  <h1 class="title"> Edit Produk </h1>

  <div class="edit-container flex">
    <div class="img">
      <img src="../dist/img/gambar_produk/<?php echo $data['gambar']; ?>" alt="" width="500px" height="500px">
    </div>

    <form action="proses_edit_produk.php" class="flex form" method="post" class="flex form" enctype="multipart/form-data">
      <!-- isi value ku nu geus aya dina database, meh mun teu jadi ngedit bisa langsung pencet konfirm atau update -->
      <input name="idproduk" value="<?php echo $data['idproduk']; ?>" hidden />
      <input class="input" type="text" name="namaproduk" placeholder="Nama Produk" value="<?php echo $data['namaproduk']; ?>" required>
      <textarea class="input" type="text" placeholder="Deskripsi" required style="resize: none;" name="komposisi"><?php echo $data['komposisi']; ?></textarea>
      <textarea class="input" type="text" placeholder="Deskripsi" required style="resize: none;" name="deskripsi"><?php echo $data['deskripsi']; ?></textarea>
      <input class="input" type="text" name="harga" placeholder="Harga Produk" value="<?php echo $data['harga']; ?>" required>
      <div class="input">
        <label for="img">Select image:</label>
        <input type="file" name="gambar">
        <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
      </div>
      <button type="submit" class="link">Edit</button>
    </form>
  </div>
</div>

<?php
require_once "../view/footer_admin.php";
?>
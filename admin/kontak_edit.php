<?php
require_once "../view/header_admin.php";
include '../script/koneksi.php';
if (isset($_GET['idkontak'])) {
  // ambil nilai idkontak dari url dan disimpan dalam variabel $id
  $idkontak = ($_GET["idkontak"]);

  // menampilkan data dari database yang mempunyai idkontak=$idkontak
  $query = "SELECT * FROM kontak WHERE idkontak='$idkontak'";
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
    // echo "<script>alert('Data tidak ditemukan pada database');window.location='tentang_admin.php';</script>";
  }
} else {
  // apabila tidak ada data GET idtentang pada akan di redirect
  echo "<script>alert('Masukkan data id.');window.location='tentang_admin.php';</script>";
}
?>

<div class="edit flex">
  <h1 class="title"> Edit Kontak </h1>
  <div class="edit-container flex">
    <div class="img">
      <img src="../dist/img/kontak/<?php echo $data['gambar']; ?>" alt="">
    </div>

    <form action="proses_edit_kontak.php" method="post" class="flex form form-kontak" enctype="multipart/form-data">
      <input type="hidden" class="input" value="<?php echo $data['idkontak']; ?>" name="idkontak">
      <!-- isi value ku nu geus aya dina database, meh mun teu jadi ngedit bisa langsung pencet konfirm atau update -->
      <select class="input" name="tipekontak" placeholder="peran" required>
        <option value="<?php echo $data['idkontak']; ?>"> <?php echo $data['tipekontak']; ?> </option>
        <option value="0"> Pilih </option>
        <option value="Developer">Developer</option>
        <option value="Owner">Owner</option>
      </select>
      <input class="input" type="text" name="namakontak" placeholder="Nama" value="<?php echo $data['namakontak']; ?>" required>
      <textarea class="input" style="min-height:10rem; resize: none;" type="text" placeholder="Deskripsi" name="tentang" required> <?php echo $data['tentang']; ?></textarea>
      <input type="text" class="input" placeholder="Id Line" value="<?php echo $data['line']; ?>" name="line">
      <input type="text" class="input" placeholder="No. WhatsApp" value="<?php echo $data['whatsapp']; ?>" name="whatsapp">
      <input type="text" class="input" placeholder="Instagram" value="<?php echo $data['instagram']; ?>" name="instagram">
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
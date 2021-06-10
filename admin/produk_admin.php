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
?>

<div class="main-container">
  <?php
  $id = $_GET['idproduk'];
  $ambildata = mysqli_query($conn, "SELECT * FROM produk WHERE idproduk='$id'");
  while ($row = mysqli_fetch_array($ambildata)) {
  ?>
    <div class="flex main admin">
      <div class="product">
        <img src="../dist/img/gambar_produk/<?php echo $row['gambar']; ?>" alt="" class="thumbnail">
      </div>
      <div class="desc card">
        <h2> <?php echo $row['namaproduk']; ?></h2>
        <h3>Komposisi</h3>
        <ul>
          <li> <?php echo $row['komposisi']; ?> </li>
        </ul>
        <h3>Deskripsi</h3>
        <p><?php echo $row['deskripsi']; ?></p>
        <br>
        <h3><?php echo rupiah($row['harga']); ?></h3>
        <br>
        <a href="produk_edit.php?idproduk=<?php echo $row['idproduk']; ?>" class="link" style="text-align:center;"> Edit </a>

      </div>
    </div>
  <?php } ?>
  <div class="review">
    <h1>Ulasan</h1>

    <div class="flex review-container">
      <?php
      $idproduk = $_GET['idproduk'];
      $query = "SELECT * FROM review_produk WHERE idproduk = '$idproduk'";
      $hasil = mysqli_query($conn, $query);
      if (mysqli_num_rows($hasil) > 0) {
        while ($data = mysqli_fetch_array($hasil)) {
      ?>
          <div class="card card-review">
            <h2><?php echo $data['namareview']; ?></h2>
            <p><?php echo $data['tgl']; ?></p><br>
            <p><?php echo $data['rating']; ?></p>
            <p><?php echo $data['deskripsireview']; ?></p>
          </div>
        <?php }
      } elseif (mysqli_num_rows($hasil) == 0) {
        ?>
        <h2>Belum ada ulasan</h2><br>
      <?php } ?>
    </div>
  </div>
</div>


<?php
require_once "../view/footer_admin.php";
?>
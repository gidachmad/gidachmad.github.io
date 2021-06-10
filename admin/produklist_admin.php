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
  <h3 style="font-weight:lighter; margin: 0 auto; width: 100%;"> <a href="tambah_produk.php" class="link">Tambah Produk Baru</a> </h3>
  <br><br>
  <div class="grid produk-list">
    <?php
    $query = "SELECT * FROM produk ORDER BY idproduk ASC";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <div class="produk-item card flex">
          <img class="thumb" src="../dist/img/gambar_produk/<?php echo $row['gambar']; ?>" alt="">
          <h2> <?php echo $row['namaproduk']; ?> </h2>
          <p><?php echo substr($row['deskripsi'], 0, 70) ?>...</p>
          <h3><?php echo rupiah($row['harga']); ?></h3>
          <a href="produk_admin.php?idproduk=<?php echo $row['idproduk']; ?>" class=" link">Lihat Produk</a>
          <form action="" class="flex form">
            <!-- ieu di hidden meh langsung bisa ngadelete datana, -->
            <input class="input" type="text" name="id_produk" value="" hidden>
            <!-- ieu link ngedit na langsung per produk, hiji hiji -->
            <a href="produk_edit.php?idproduk=<?php echo $row['idproduk']; ?>" class="link"> Edit </a>
            <a href="proses_hapus_produk.php?idproduk=<?php echo $row['idproduk']; ?>" class="link" onclick="return confirm('Anda yakin akan menghapus data ini?')"> Hapus </a>
          </form>
        </div>
      <?php
      }
    } else { ?>
      <h2 align="center">Tidak Ada Produk</h2>
    <?php } ?>

  </div>
</div>
<?php
require_once "../view/footer_admin.php";
?>
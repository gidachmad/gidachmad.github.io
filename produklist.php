<?php
require_once "view/header.php";
include 'script/koneksi.php';
?>

<div class="grid produk-list main-container">
  <?php
  $query = "SELECT * FROM produk ORDER BY idproduk ASC";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
  ?>
      <div class="produk-item card flex">
        <img class="thumb" src="dist/img/gambar_produk/<?php echo $row['gambar']; ?>" alt="">
        <h2> <?php echo $row['namaproduk']; ?> </h2>
        <p> <?php echo $row['komposisi']; ?> </p>
        <p><?php echo substr($row['deskripsi'], 0, 70) ?>...</p>
        <h3><?php echo rupiah($row['harga']); ?></h3>
        <a href="produk.php?idproduk=<?php echo $row['idproduk']; ?>" class="link">Lihat Produk</a>
      </div>
    <?php  }
  } else { ?>
    <h2 align="center">Tidak ada Produk</h2>
  <?php } ?>
</div>

<?php
require_once "view/footer.php";
?>
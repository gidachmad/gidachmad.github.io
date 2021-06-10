<?php
require_once "view/header.php";
include 'script/koneksi.php';
?>

<div class="tentang flex">
  <?php
  $query = "SELECT idtentang,judul,deskripsi,gambar FROM tentang";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {
  ?>
    <h1 class="title"> Tentang Kopi Abah Ambu </h1>
    <div class="grid">
      <div class="desc">
        <h2><?php echo $row['judul']; ?> </h2>
        <p><?php echo $row['deskripsi']; ?></p>
      </div>

      <div class="img">
        <img src="dist/img/<?php echo $row['gambar']; ?>" alt="">
      </div>
    </div>
  <?php
  } ?>
</div>

<?php
require_once "view/footer.php";
?>
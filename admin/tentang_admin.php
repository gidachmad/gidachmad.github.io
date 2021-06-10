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
        <a href="tentang_edit.php?idtentang=<?php echo $row['idtentang']; ?>" class="link" style="text-align:center;"> Edit </a>
      </div>

      <div class="img">
        <img src="../dist/img/<?php echo $row['gambar']; ?>" alt="">
      </div>
    </div>
  <?php
  } ?>


</div>

<?php
require_once "../view/footer_admin.php";
?>
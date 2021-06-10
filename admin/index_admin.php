<?php
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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../dist/css/dashboard.css">
  <title>Cup KAA</title>
</head>

<body>
  <div class="background flex">
    <div class="container">
      <?php
      $query = "SELECT * FROM quote";
      $result = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <h1><?php echo $row['judul']; ?></h1><br>
        <p><?php echo $row['deskripsi']; ?></p>
        <br><br>
        <div class="link-dash flex">
          <a href="produklist_admin.php" class="link">Produk</a>
          <a href="tentang_admin.php" class="link">Tentang</a>
          <a href="kontak_admin.php" class="link">Kontak</a>
          <a href="dashboard_edit.php?idquote=<?php echo $row['idquote']; ?>" class="link"> Edit </a>
          <a href="logout.php" class="link" onclick="return confirm('Anda ingin Logout?')"> Logout </a>
          <a href="edit_password.php" class="link"> Edit Password </a>
        <?php } ?>
        </div>
    </div>
  </div>
</body>

</html>
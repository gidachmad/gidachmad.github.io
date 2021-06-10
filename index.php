<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dist/css/dashboard.css">
  <title>Cup KAA</title>
</head>

<body>
  <div class="background flex">
    <div class="container">
      <?php
      include 'script/koneksi.php';
      $query = mysqli_query($conn, "SELECT * FROM quote");
      $row = mysqli_fetch_array($query);
      ?>
      <h1><?php echo $row['judul']; ?></h1><br>
      <p><?php echo $row['deskripsi']; ?></p><br>
      <ul class="link-dash flex">
        <li class="list"><a href="produklist.php" class="link">Produk</a></li>
        <li class="list"><a href="tentang.php" class="link">Tentang</a></li>
        <li class="list"><a href="kontak.php" class="link">Kontak</a></li>
      </ul>
    </div>
  </div>
</body>

</html>
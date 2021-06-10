<?php
require_once "view/header.php";
include 'script/koneksi.php';
session_start();
if (isset($_GET['action']) && $_GET['action'] == "add") {
  $id = intval($_GET['idproduk']);
  if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity']++;
  } else {
    $sql_p = "SELECT * FROM produk WHERE idproduk='$id'";
    $query_p = mysqli_query($conn, $sql_p);
    if (mysqli_num_rows($query_p) != 0) {
      $row_p = mysqli_fetch_array($query_p);
      $_SESSION['cart'][$row_p['idproduk']] = array("quantity" => 1, "harga" => $row_p['harga']);
    } else {
      $message = "Product ID is invalid";
    }
  }
}
if (isset($_GET['action']) && $_GET['action'] == "remove") {
  if (!empty($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $k => $v) {
      if ($_GET["idproduk"] == $k)
        unset($_SESSION["cart"][$k]);
      if (empty($_SESSION["cart"]))
        unset($_SESSION["cart"]);
    }
  }
}
$id = $_GET['idproduk'];
if (isset($_GET['act']) && $_GET['act'] == "submit") {
  // membaca data komentar dari form
  $nama = $_POST['namareview'];
  $tgl = $_POST['tgl'];
  $rating = $_POST['rating'];
  $idproduk = $_POST['idproduk'];
  $deskripsireview = $_POST['deskripsireview'];

  // proses insert komentar ke database
  $query = "INSERT INTO review_produk(namareview, tgl, rating, idproduk, deskripsireview)
            VALUES ('$nama', '$tgl', '$rating', '$idproduk', '$deskripsireview')";
  $hasil = mysqli_query($conn, $query);
}

?>

<div class="main-container">
  <?php
  $ambildata = mysqli_query($conn, "SELECT * FROM produk WHERE idproduk='$id'");
  while ($row = mysqli_fetch_array($ambildata)) {
  ?>
    <div class="flex main">
      <div class="product">
        <img src="dist/img/gambar_produk/<?php echo $row['gambar']; ?>" alt="" class="thumbnail">
      </div>
      <div class="desc card">
        <h2> Nama Produk </h2>
        <h3>Komposisi</h3>
        <ul>
          <li> <?php echo $row['komposisi']; ?> </li>
        </ul>
        <h3>Deskripsi</h3>
        <p><?php echo $row['deskripsi']; ?></p>
        <br>
        <h3><?php echo rupiah($row['harga']); ?></h3>
        <div class="buy flex">
          <a href="produk.php?page=produk&action=add&idproduk=<?php echo $row['idproduk']; ?>" class="buy-link link"> <span class="center">Masukan Keranjang</span> </a>
          <a href="beli_langsung.php?idproduk=<?php echo $row['idproduk']; ?>" class="buy-link link"> <span class="center">Beli Langsung</span></a>
        </div>
      </div>
    <?php } ?>
    <div class="cart card flex">
      <h2>Keranjang</h2>
      <table>
        <tr class="table">
          <th>No</th>
          <th>Produk</th>
          <th>Jumlah</th>
          <th>Harga</th>
        </tr>
        <?php
        $no = 1;
        $totalprice = 0;
        if (isset($_SESSION['cart'])) {
          $sql = "SELECT * FROM produk WHERE idproduk IN(";
          foreach ($_SESSION['cart'] as $id => $value) {
            $sql .= $id . ",";
          }
          $sql = substr($sql, 0, -1) . ") ORDER BY idproduk ASC";
          $query = mysqli_query($conn, $sql);
          if (!empty($query)) {
            while ($row = mysqli_fetch_array($query)) {
        ?>
              <tr class="table">
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['namaproduk']; ?></td>
                <td><?php echo $_SESSION['cart'][$row['idproduk']]['quantity']; ?></td>
                <?php
                $subtotal = $_SESSION['cart'][$row['idproduk']]['quantity'] * $row['harga'];
                $totalprice += $subtotal;
                ?>
                <td><?php echo rupiah($row['harga']); ?></td>
                <td><a href="produk.php?page=produk&action=remove&idproduk=<?php echo $row['idproduk']; ?>">hapus</a></td>
              <?php
            }
          } else {
              ?>

              <tr>
                <td colspan="3"><?php echo "<i>Keranjangmu kosong"; ?></td>
              </tr>
            <?php
          }
            ?>
          <?php
        } else {
          ?>
            <tr>
              <td><?php echo "Keranjangmu kosong"; ?></td>
            </tr>
          <?php
        }
          ?>
          </tr>
      </table>
      <br>
      <h3>Jumlah : <?php echo rupiah($totalprice); ?></h3><br>
      <a href="konfirmasi.php" class="link"> Konfirmasi Pembelian </a>
    </div>

    </div>

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

      <input type="button" value="Tambah Ulasan" class="link" onclick="review()">

      <div class="flex review-form" id="review-form">
        <h1 id="add-review">Tambah Ulasan</h1>
        <form class="form flex" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=produk&act=submit&idproduk=<?php echo $idproduk; ?>" method="post">
          <input class="input" type="hidden" placeholder="test" name="idproduk" value="<?php echo $idproduk ?>">
          <input class="input" type="hidden" placeholder="Nama" name="tgl" value="<?php echo date("Y-m-d h:i:sa"); ?>">
          <input class="input" type="text" placeholder="Nama" name="namareview">
          <label for=""> Rating anda mengenai produk kami </label>
          <div class="input flex radio-input">
            <span class="radio">
              <input type="radio" name="rating" value="tidak puas" id="1"><br><label for="1">Tidak Puas</label>
            </span>
            <span class="radio">
              <input type="radio" name="rating" value="kurang puas" id="2"><br><label for="2">Kurang Puas</label>
            </span>
            <span class="radio">
              <input type="radio" name="rating" value="biasa" id="3"><br><label for="3">Biasa</label>
            </span>
            <span class="radio">
              <input type="radio" name="rating" value="agak puas" id="4"><br><label for="4">Agak Puas</label>
            </span>
            <span class="radio">
              <input type="radio" name="rating" value="sangat puas" id="5"><br><label for="5">Sangat Puas</label>
            </span>
          </div>
          <textarea class="input" style="min-height:10rem; resize: none;" type="text" placeholder="Ketik review anda disini mengenai produk kami ini..." name="deskripsireview" required></textarea>
          <input type="submit" value="Submit Review" class="link" name="submit">
      </div>
      </form>
    </div>
</div>


<?php
require_once "view/footer.php";
?>
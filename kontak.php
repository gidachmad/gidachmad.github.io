<?php
require_once "view/header.php";
include 'script/koneksi.php';
?>

<div class="flex kontak">

  <h1 class="title"> Kontak Kami </h1>
  <?php
  $query = "SELECT* FROM kontak LIMIT 1";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {
  ?>
    <div class="owner">
      <h1 class="subtitle"> Owner Kopi Abah Ambu </h1>
      <div class="card flex identitas">
        <div class="img">
          <img src="dist/img/kontak/<?php echo $row['gambar']; ?>" alt="">
        </div>

        <div class="desc flex">
          <h2><?php echo $row['namakontak']; ?></h2>
          <p><?php echo $row['tentang']; ?></p>

          <div class="sosmed flex">
            <span class="icon"><img src="dist/icon/line-ori.png" alt=""></span>
            <a href="<?php echo $row['line']; ?>" class="link-sosmed"><?php echo $row['line']; ?></a>
          </div>
          <div class="sosmed flex">
            <span class="icon"><img src="dist/icon/instagram.png" alt=""></span>
            <a href="https://www.instagram.com/<?php echo $row['instagram']; ?>" class="link-sosmed"><?php echo $row['instagram']; ?></a>
          </div>
          <div class="sosmed flex">
            <span class="icon"><img src="dist/icon/wa-ori.png" alt=""></span>
            <a href="https://wa.me/<?php echo $row['whatsapp']; ?>" class="link-sosmed"><?php echo $row['whatsapp']; ?></a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <div class="developer">
    <h1 class="subtitle"> Developer Cup KAA </h1>
    <?php
    $query = "SELECT* FROM kontak LIMIT 1,3";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <div class="card flex identitas">
        <div class="img">
          <img src="dist/img/kontak/<?php echo $row['gambar']; ?>" alt="">
        </div>

        <div class="desc flex">
          <h2><?php echo $row['namakontak']; ?></h2>
          <p><?php echo $row['tentang']; ?></p>

          <div class="sosmed flex">
            <span class="icon"><img src="dist/icon/line-ori.png" alt=""></span>
            <a class="link-sosmed"><?php echo $row['line']; ?></a>
          </div>
          <div class="sosmed flex">
            <span class="icon"><img src="dist/icon/instagram.png" alt=""></span>
            <a href="https://www.instagram.com/<?php echo $row['instagram']; ?>" class="link-sosmed"><?php echo $row['instagram']; ?></a>
          </div>
          <div class="sosmed flex">
            <span class="icon"><img src="dist/icon/wa-ori.png" alt=""></span>
            <a href="https://wa.me/<?php echo $row['whatsapp']; ?>" class="link-sosmed"><?php echo $row['whatsapp']; ?></a>
          </div>
        </div>
      </div>
    <?php
    } ?>
  </div>
</div>

<?php
require_once "view/footer.php";
?>
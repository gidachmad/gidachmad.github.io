<?php
require_once "../view/header_admin.php";
include '../script/koneksi.php';
session_start();
?>

<div class="edit login flex">
  <h1 class="title"> Edit Password </h1>
  <form action="proses_edit_admin.php" class="flex form" method="post">

    <!-- jang id atau syarat ganti passwordna -->
    <input type="hidden" name="" value="">

    <!-- jang login, mun bisa pang nambahkeun validasi na -->
    <input class="input" type="text" name="username" placeholder="Username" required value="<?php echo $_SESSION['user']; ?>">
    <input class="input" type="password" name="password" placeholder="Password Baru" required>
    <input type="submit" value="Edit" class="link" name="edit">

  </form>
</div>

<?php
require_once "../view/footer_admin.php";
?>
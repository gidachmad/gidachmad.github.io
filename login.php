<?php
require_once "view/header_admin.php";
include 'script/koneksi.php';
if (isset($_POST["login"])) {
  $user = $datalogin["username"];
  $pass = $datalogin["password"];

  $checkuser = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user'");
  if (mysqli_num_rows($checkuser) === 1) {

    $result = mysqli_fetch_assoc($checkuser);

    if (password_verify($pass, $result["password"])) {
      $_SESSION["user"] = $user;
      $_SESSION["login"] = true;

      if (isset($datalogin["rememeberme"])) {
        setcookie("login", "tetap_ingat", time() + 30);
      } else {
        echo "Cookie belum dibuat";
      }
      echo "
		<script>alert('Anda berhasil login');
		document.location.href='administrator.php';
		</script>
		";
    }
  } else {
    print "<p style=\"color:red; font-style italic\">Username / Password salah!</p>";
  }
}
?>

<div class="login flex">
  <h1 class="title"> LOG IN</h1>
  <form action="" class="flex form" method="post">
    <!-- jang login, mun bisa pang nambahkeun validasi na -->
    <input class="input" type="text" name="username" placeholder="Nama" required>
    <input class="input" type="password" name="password" placeholder="Password" required>
    <input type="checkbox" name="rememberme" value="rememberme">Ingat Saya<br><br>
    <input type="button" value="Masuk" class="link">

  </form>
</div>



<?php
require_once "view/footer_admin.php";
?>
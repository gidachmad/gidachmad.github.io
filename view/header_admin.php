<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../dist/css/main.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <title> Cup KAA - Online Kopi Abah Ambu Shop </title>
</head>

<body>
  <span style="flex:1 0 auto;">
  <div class="header flex">
    <a href="index_admin.php"><img class="logo" src="../dist/img/logo-cup-kaa.png" alt=""></a>
    <ul class="navbar flex" id="navbar">
    <li><span class="closeNav link" onclick="closeNav()">&times;</span></li>
      <li class="list"><a href="index_admin.php" class="link"> Beranda </a></li>
      <li class="list"><a href="produklist_admin.php" class="link"> Produk </a></li>
      <li class="list"><a href="tentang_admin.php" class="link"> Tentang </a></li>
      <li class="list"><a href="kontak_admin.php" class="link"> Kontak </a></li>
      <li class="list"><a href="logout.php" class="link" onclick="return confirm('Anda ingin Logout?')"> Logout </a></li>   
      <li class="list"><a href="edit_password.php?idproduk=<?php echo $row['idproduk']; ?>" class="link" style="width:100%"> Edit Password </a></li>    
    </ul>
    <span class="menu-small" onclick="openNav()">
        <div class="menu-burger"></div>
        <div class="menu-burger"></div>
        <div class="menu-burger"></div>
      </span>
  </div>
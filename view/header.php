<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dist/css/main.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <title> Cup KAA - Online Coffee Shop </title>
</head>
<body>
<span style="flex: 1 0 auto;">
    <div class="header flex">
      <a href="index.php"><img class="logo" src="dist/img/logo-cup-kaa.png" alt=""></a>
      <ul class="navbar flex" id="navbar">
        <li><span class="closeNav link" onclick="closeNav()">&times;</span></li>
        <li class="list"><a href="index.php" class="link"> Beranda </a></li>
        <li class="list"><a href="produklist.php" class="link"> Produk </a></li>
        <li class="list"><a href="tentang.php" class="link"> Tentang </a></li>
        <li class="list"><a href="kontak.php" class="link"> Kontak </a></li>
      </ul>
      <span class="menu-small" onclick="openNav()">
        <div class="menu-burger"></div>
        <div class="menu-burger"></div>
        <div class="menu-burger"></div>
      </span>
    </div>
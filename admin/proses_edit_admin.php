<?php
include '../script/koneksi.php';
$user = $_POST['username'];
$pass = $_POST['password'];
$pass = password_hash($pass, PASSWORD_DEFAULT);
$query = mysqli_query($conn, "UPDATE admin SET username='$user',password='$pass'");

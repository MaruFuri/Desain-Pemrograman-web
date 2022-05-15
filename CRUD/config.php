<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "db_crud";

$conn = mysqli_connect($server, $user, $pass, $database);
if (!$conn) { //cek koneksi
    die("Tidak dapat terkoneksi ke database");
}
if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>
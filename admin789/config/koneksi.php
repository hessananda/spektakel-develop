<?php
date_default_timezone_set("Asia/Jakarta");

$server = "localhost:3307";
$username = "root";
$password = "";
$database = "spektakel_beta";

// Koneksi dan memilih database di server
@mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

?>
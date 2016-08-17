<?php
date_default_timezone_set("Asia/Jakarta");

$host = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'spektake_spekspekspek';

//mysqli_connect(host,username,password,dbname,port,socket);
$con = mysqli_connect($host,$username,$password,$database);

?>
<?php  //require_once('sessionchecker.php') ?>
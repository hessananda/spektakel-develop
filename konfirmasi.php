<?php
   @session_start();
   require_once("config/koneksi.php");

if (isset($_GET['code'])) {
	$registration_code = $_GET['code'];
	
	if (isset($_GET['action'])) {
		$action = $_GET['action'] ;	
	}
}
else{
	header("location:index.php");
}

$now = date("Y-m-d H:i:s");
$cek_query = "SELECT id, username, email, password FROM member WHERE registration_code = '".$registration_code."' AND status = 0 " ;
$query = mysqli_query($con,$cek_query);
$count = mysqli_num_rows($query);

$cek_query_registered = "SELECT id, username, email, password FROM member WHERE registration_code = '".$registration_code."' AND status = 1 " ;

$query_registered = mysqli_query($con,$cek_query_registered);
$count_registered = mysqli_num_rows($query_registered);
	

if ($count > 0 AND $count_registered < 1) {
	$member = mysqli_fetch_assoc($query);

	mysqli_query($con,"UPDATE member SET status = 1, confirmation_date = '$now' WHERE registration_code = '".$registration_code."'  ");	

	if ($action =='home') {
		$tujuan = "home";
	}
	elseif ($action == 'profil') {
		$tujuan = "profil";
	}
	elseif ($action == 'post_event') {
		$tujuan = "post_event";
	}

}
elseif($count < 1 AND $count_registered > 0){
	
	$tujuan = 'login';

}
else{

	$tujuan = "undefined";

}

?>
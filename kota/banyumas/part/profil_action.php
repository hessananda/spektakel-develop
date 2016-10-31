<?php

require_once("../config/koneksi.php");   
session_start();

include "../config/file_action.php";

$master = 'member' ;
$now = date("Y-m-d H:i:s");
$action = $_GET['action'];

if ($action=='profil') {
	$birthdate = $_POST['tahun_lahir']."-".$_POST['bulan_lahir']."-".$_POST['tgl_lahir'];

	$query = "UPDATE ".$master." SET 
		 full_name = '$_POST[full_name]',			 
		 birthdate = '$birthdate',
		 
		 company = '$_POST[company]',
		 position = '$_POST[position]',
		 street = '$_POST[street]',
		 province = '$_POST[province]',
		 city = '$_POST[city]',
		 kecamatan = '$_POST[kecamatan]',
		 kodepos = '$_POST[kodepos]',
		 description = '$_POST[description]',

		 phone = '$_POST[phone]',
		 website = '$_POST[website]',
		 facebook = '$_POST[facebook]',
		 twitter = '$_POST[twitter]',
		 instagram = '$_POST[instagram]',			 
		 gender = '$_POST[gender]',
		 last_edit = '$now'

		 WHERE id = '".$_SESSION['userid']."' ";

	mysqli_query($con,$query);

	if ($_FILES['image']['name'] <> '')
		{
			upload_file('../images/member','image');
			delete_file('photo',$master,'../images/member','id',$_SESSION['userid'])	;	
			mysqli_query($con,"UPDATE ".$master." SET photo = '$nama_final' WHERE id = '".$_SESSION['userid']."' ");
		}
	echo $_FILES['image']['name'];
	echo mysqli_error($con);
	header("location:../profil.php");
}
elseif ($action=='password') {	

	$query = "UPDATE ".$master." SET 			 
			  password = '".md5($_POST['pass2'])."'
			  WHERE id = '".$_SESSION['userid']."'";

	mysqli_query($con,$query);

	echo mysqli_error($con);

	header("location:../profil.php");
	
}
elseif ($action=='tutupakun') {		

		$query = "UPDATE ".$master." SET 		 
				  status = '$_POST[answer]',
				  last_edit = '$now'
				  WHERE id = '".$_SESSION['userid']."' ";

		 mysqli_query($con,$query);
		 if ($_POST['answer']==1) {
		 	header("location:../part/logout.php");	
		 }
		 else{
		 	header("location:../profil.php");
		 }		 	
}

?>